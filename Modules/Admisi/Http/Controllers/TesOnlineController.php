<?php

namespace Modules\Admisi\Http\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Modules\Admisi\Entities\Biodata;
use Modules\Admisi\Entities\PembayaranPendaftaran;
use Modules\Admisi\Entities\TesOnline;
use Illuminate\Support\Str;

class TesOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cek_pembayaran_pendaftaran = PembayaranPendaftaran::where('id_user', auth()->user()->id)->first();
        if ($cek_pembayaran_pendaftaran) {
            if (is_null($cek_pembayaran_pendaftaran->status_pembayaran)) {
                $biodata = Biodata::where('user_id', auth()->user()->id)->first();
                return view('admisi::cbt.belumbayar', compact('cek_pembayaran_pendaftaran', 'biodata'));
            } elseif (strtolower($cek_pembayaran_pendaftaran->status_pembayaran) == 'terbayar') {

                $cek_akun_cbt = TesOnline::where('user_name', auth()->user()->email)->first();
                // dd($cek_akun_cbt);
                
                if ($cek_akun_cbt) {
                    $hasilcbt = DB::connection('cbt')->table('cbt_tes_soal as a')
                    ->select(DB::raw("SUM(tessoal_nilai) as nilai"))
                    ->join('cbt_tes_user as b', 'a.tessoal_tesuser_id', '=', 'b.tesuser_tes_id')
                    ->join('cbt_user as c', 'b.tesuser_user_id', '=', 'c.user_id')
                    // ->where('c.user_name', '=', auth()->user()->email)
                    ->where('c.user_name', '=', '1502172605000001')
                    ->first();
                    // dd($hasilcbt);
                    if (!empty($hasilcbt->nilai)) {
                        if ($hasilcbt->nilai >= 20) {
                            // dd('anda lulus');
                            return view('admisi::cbt.lulus');
                        } else {
                            dd('anda tidak lulus');
                        }
                    } else {
                        return view('admisi::cbt.belumtes', compact('cek_akun_cbt'));
                    }
                } else {
                    $insert = array([
                        'user_grup_id' => 14,
                        'user_name' => auth()->user()->email,
                        'user_password' => Str::random(8),
                        'user_email' => auth()->user()->email,
                        'user_firstname' => auth()->user()->name,
                        'user_detail' => 'Peserta ODS tanggal',
                    ]);
                    TesOnline::insert($insert);

                    return redirect()->to('admisi-tes-online');
                }
            }
        } else {
            $id_kelas_pendaftaran = DB::table('mahasiswas as a')
                ->join('prodi_has_kelas_jalur_pendaftarans as b', 'b.id', 'a.has_prodi_kelas_jalur')
                ->where('a.user_id', auth()->user()->id)
                ->first()->kelas_id;

            if ($id_kelas_pendaftaran == 1) {
                $biaya = 200000;
            } elseif ($id_kelas_pendaftaran == 2) {
                $biaya = 250000;
            }

            $info[] = [
                'label_key' => "PMB",
                'label_value' => 'Pembayaran Registrasi PMB',
            ];

            $rincian[] = [
                'kode_rincian' => 'PMB',
                'deskripsi' => 'Pembayaran Registrasi PMB',
                'nominal' => $biaya,
            ];

            $total_nominal = $biaya;

            $invoice = 'INV/PMB/' . time() . sprintf("%04s", auth()->user()->id);
            try {
                PembayaranPendaftaran::create(
                    [
                        'id_user'               => auth()->user()->id,
                        'nomor_invoice'         => $invoice,
                        'nomor_pembayaran'      => date('y') . sprintf("%05s", auth()->user()->id),
                        'id_pelanggan'          => date('y') . sprintf("%05s", auth()->user()->id),
                        'nama'                  => auth()->user()->name,
                        'info'                  => json_encode($info),
                        'rincian'               => json_encode($rincian),
                        'status_pembayaran'     => NULL,
                        'total_nominal'         => $total_nominal,
                        'waktu_berlaku'         => now(),
                        'waktu_kadaluarsa'      => Carbon::now()->addDays(3)->format('Y-m-d') . ' 23.59.59',
                    ]
                );
                return view('admisi::cbt.belumbayar');
            } catch (\Throwable $th) {
                dd($th);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admisi::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('admisi::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admisi::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
