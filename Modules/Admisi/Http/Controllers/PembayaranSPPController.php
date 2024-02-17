<?php

namespace Modules\Admisi\Http\Controllers;

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
        // $query = DataHelper::cekPembayaranPendaftaran(auth()->user()->id);
        // if (is_null($query)) {
        //     $biodata = DataHelper::cekBiodata(auth()->user()->id);
        //     if (is_null($biodata)) {
        //         return redirect()->route('admisi-tes-online.index');
        //     } else {
        //         toastr()->warning('Silahkan lakukan pembayaran pendaftaran dahulu');
        //         return redirect()->route('admisi-tes-online.index');
        //     }
        // }

        $cek_spp = PembayaranSPP::where(function ($query) {
            $query->where('nomor_invoice', 'like', '%' . '/SPP/' . '%');
            $query->where('id_user', auth()->user()->id);
        })
            ->orderby('id', 'asc')
            ->first();


        if ($cek_spp) {
            $biodata = Biodata::where('user_id', auth()->user()->id)->first();
            return view('admisi::spp.index', compact('cek_spp', 'biodata'));
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
        // $query = DataHelper::cekPembayaranPendaftaran(auth()->user()->id);
        // if (is_null($query)) {
        //     $biodata = DataHelper::cekBiodata(auth()->user()->id);
        //     if (is_null($biodata)) {
        //         return redirect()->route('admisi-tes-online.index');
        //     } else {
        //         toastr()->warning('Silahkan lakukan pembayaran pendaftaran dahulu');
        //         return redirect()->route('admisi-tes-online.index');
        //     }
        // }
        //

        $has_prodi_kelas_jalur = Biodata::where('user_id', auth()->user()->id)->first();
        $jalur_pendaftaran_id = HasPKJAdminAdmisi::find($has_prodi_kelas_jalur->has_prodi_kelas_jalur);
        $kode_prodi = $jalur_pendaftaran_id->prodi_id;

        if ($jalur_pendaftaran_id->jalur_pendaftaran_id == 3) {
            if ($kode_prodi == '60201') {
                $nominal = 3860000;
            } elseif ($kode_prodi == '61201') {
                $nominal = 3860000;
            } elseif ($kode_prodi == '57201') {
                $nominal = 4110000;
            } elseif ($kode_prodi == '55201') {
                $nominal = 4110000;
            } elseif ($kode_prodi == '54251') {
                $nominal = 4110000;
            } else {
                $nominal = 2860000;
            }
        } else {
            if ($kode_prodi == '60201') {
                if ($jalur_pendaftaran_id->prodi_id == 1) {
                    $nominal = 3860000;
                } else {
                    $nominal = 4860000;
                }
            } elseif ($kode_prodi == '61201') {
                if ($jalur_pendaftaran_id->prodi_id == 1) {
                    $nominal = 3860000;
                } else {
                    $nominal = 4860000;
                }
            } elseif ($kode_prodi == '57201') {
                if ($jalur_pendaftaran_id->prodi_id == 1) {
                    $nominal = 4110000;
                } else {
                    $nominal = 4860000;
                }
            } elseif ($kode_prodi == '55201') {
                if ($jalur_pendaftaran_id->prodi_id == 1) {
                    $nominal = 4110000;
                } else {
                    $nominal = 4860000;
                }
            } elseif ($kode_prodi == '54251') {
                if ($jalur_pendaftaran_id->prodi_id == 1) {
                    $nominal = 4110000;
                } else {
                    $nominal = 4860000;
                }
            } else {
                if ($jalur_pendaftaran_id->prodi_id == 1) {
                    $nominal = 2860000;
                } else {
                    $nominal = 3860000;
                }
            }
        }

        if ($request->metode_pembayaran == 1) {
            $bayar = $nominal;
            $value = "Pembayaran SPP Lunas";
        } else {
            $bayar = 1 / 2 * $nominal;
            $value = "Pembayaran SPP Angsuran Pertama";
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
            dd($th);
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
