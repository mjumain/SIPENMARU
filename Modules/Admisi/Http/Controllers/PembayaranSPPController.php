<?php

namespace Modules\Admisi\Http\Controllers;

use App\Helpers\DataHelper;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admisi\Entities\Admin\HasPKJAdminAdmisi;
use Modules\Admisi\Entities\Biodata;
use Modules\Admisi\Entities\PembayaranSPP;
use Psy\Util\Str;

class PembayaranSPPController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read_admisi_pembayaran_spp')->only('index', 'show');
        $this->middleware('permission:create_admisi_pembayaran_spp')->only('create', 'store');
        $this->middleware('permission:update_admisi_pembayaran_spp')->only('edit', 'update');
        $this->middleware('permission:delete_admisi_pembayaran_spp')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = DataHelper::cekPembayaranPendaftaran(auth()->user()->id);
        if (is_null($query) || is_null($query->status_pembayaran)) {
            $biodata = DataHelper::cekBiodata(auth()->user()->id);
            if (is_null($biodata)) {
                return redirect()->route('admisi-tes-online.index');
            } else {
                toastr()->warning('Silahkan lakukan pembayaran pendaftaran dahulu');
                return redirect()->route('admisi-tes-online.index');
            }
        }

        $cek_spp = PembayaranSPP::where(function ($query) {
            $query->where('nomor_invoice', 'like', '%' . '/SPP/' . '%');
            $query->where('id_user', auth()->user()->id);
        })
            ->orderby('id', 'asc')
            ->first();

        if ($cek_spp) {
            if (strtolower($cek_spp->status_pembayaran) == 'terbayar') {

                $biodata = Biodata::where('user_id', auth()->user()->id)
                    ->join('prodi_has_kelas_jalur_pendaftarans as b', 'b.id', 'has_prodi_kelas_jalur')
                    ->join('prodis as c', 'b.prodi_id', 'c.kode_prodi')
                    ->first();

                // dd($biodata);

                if (is_null($biodata->npm)) {
                    $nomorurutlama = Biodata::whereNotNull('npm')
                        ->join('prodi_has_kelas_jalur_pendaftarans as b', 'b.id', 'has_prodi_kelas_jalur')
                        ->where('b.prodi_id', $biodata->prodi_id)
                        ->orderBy('mahasiswas.id', 'asc')
                        ->first();
                    // dd($nomorurutlama);

                    if (is_null($nomorurutlama)) {
                        $nomorurut = 1;
                    } else {
                        $nomorurut = substr($nomorurutlama->npm, -3) + 1;
                    }
                    $nomorurutbaru = sprintf("%03s", $nomorurut);

                    $npm = substr($biodata->nama_prodi, 0, 2) . '24' . substr($biodata->prodi_id, 0, 2)  .  $nomorurutbaru;

                    // dd($npm);
                    try {
                        Biodata::where('user_id', auth()->user()->id)
                            ->update([
                                'npm' => $npm,
                            ]);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }

                    return view('admisi::spp.npm', compact('biodata'));
                } else {
                    return view('admisi::spp.npm', compact('biodata'));
                }
            } else {
                $biodata = Biodata::where('user_id', auth()->user()->id)->first();
                return view('admisi::spp.index', compact('cek_spp', 'biodata'));
            }
        } else {
            return view('admisi::spp.create');
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
        $query = DataHelper::cekPembayaranPendaftaran(auth()->user()->id);
        if (is_null($query)) {
            $biodata = DataHelper::cekBiodata(auth()->user()->id);
            if (is_null($biodata)) {
                return redirect()->route('admisi-tes-online.index');
            } else {
                toastr()->warning('Silahkan lakukan pembayaran pendaftaran dahulu');
                return redirect()->route('admisi-tes-online.index');
            }
        }

        $data_pendaftaran = Biodata::where('user_id', auth()->user()->id)
            ->join('prodi_has_kelas_jalur_pendaftarans as b', 'b.id', 'has_prodi_kelas_jalur')
            ->first();
        // dd($data_pendaftaran);

        $kode_prodi = $data_pendaftaran->prodi_id;
        $kelas_id = $data_pendaftaran->kelas_id;
        $jalur_pendaftaran_id = $data_pendaftaran->jalur_pendaftaran_id;

        if ($jalur_pendaftaran_id == 3) {
            if ($kode_prodi == '54251') {
                $nominal = 1430000 * 2;
            } elseif ($kode_prodi == '55201') {
                $nominal = 2055000 * 2;
            } elseif ($kode_prodi == '57201') {
                $nominal = 2055000 * 2;
            } elseif ($kode_prodi == '60201') {
                $nominal = 1930000 * 2;
            } elseif ($kode_prodi == '61201') {
                $nominal = 1930000 * 2;
            } elseif ($kode_prodi == '60102') {
                $nominal = 8350000;
            }
        } else {
            if ($kode_prodi == '54251') {
                if ($kelas_id == 1) {
                    $nominal = 1430000 * 2;
                } else {
                    $nominal = 1930000 * 2;
                }
            } elseif ($kode_prodi == '55201') {
                if ($kelas_id == 1) {
                    $nominal = 2055000 * 2;
                } else {
                    $nominal = 2430000 * 2;
                }
            } elseif ($kode_prodi == '57201') {
                if ($kelas_id == 1) {
                    $nominal = 2055000 * 2;
                } else {
                    $nominal = 2430000 * 2;
                }
            } elseif ($kode_prodi == '60201') {
                if ($kelas_id == 1) {
                    $nominal = 1930000 * 2;
                } else {
                    $nominal = 2430000 * 2;
                }
            } elseif ($kode_prodi == '61201') {
                if ($kelas_id == 1) {
                    $nominal = 1930000 * 2;
                } else {
                    $nominal = 2430000 * 2;
                }
            } elseif ($kode_prodi == '60102') {
                if ($jalur_pendaftaran_id == 9) {
                    $nominal = 7350000;
                } else {
                    $nominal = 8350000;
                }
            }
        }

        if ($request->metode_pembayaran == 2) {
            $bayar = 1 / 2 * $nominal;
            $value = "Pembayaran SPP Angsuran Pertama";
        } else {
            $bayar = $nominal;
            $value = "Pembayaran SPP Lunas";
        }


        $info[] = [
            'label_key' => "SPP",
            'label_value' => $value,
        ];

        $rincian[] = [
            'kode_rincian' => 'SPP',
            'deskripsi' => $value,
            'nominal' => $bayar,
        ];

        $total_nominal = $bayar;

        $invoice = 'INV/SPP/' . time() . sprintf("%04s", auth()->user()->id);
        try {
            // dd($value);
            PembayaranSPP::create(
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
            return redirect()->to('admisi-pembayaran-spp');
        } catch (\Throwable $th) {
            // dd($th);
        }
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
