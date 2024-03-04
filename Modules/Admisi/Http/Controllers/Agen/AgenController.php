<?php

namespace Modules\Admisi\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Admisi\Entities\Agen;
use Modules\Admisi\Entities\Biodata;
use Modules\Admisi\Entities\PembayaranPendaftaran;

class AgenController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read_agen_admisi_dashboard')->only('index', 'show');
        $this->middleware('permission:create_agen_admisi_dashboard')->only('create', 'store');
        $this->middleware('permission:update_agen_admisi_dashboard')->only('edit', 'update');
        $this->middleware('permission:delete_agen_admisi_dashboard')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agen = Agen::where('user_id', auth()->user()->id)->first();
        if ($agen) {
            if (is_null($agen->nik)) {
                // dd('nik kosong');
                return view('admisi::agen.nikkosong');
            } else {
                if (is_null($agen->kode_referral)) {
                    $kode_referral = random_int(100000, 999999);
                    Agen::insert([
                        'user_id' => auth()->user()->id,
                        'kode_refferal' => $kode_referral,
                    ]);
                    // dd('kode referral kosong');
                } else {
                    $datas = Biodata::where('refferal', $agen->kode_referral)
                        ->join('prodi_has_kelas_jalur_pendaftarans as a', 'a.id', 'has_prodi_kelas_jalur')
                        ->join('jalur_pendaftarans as b', 'b.id', 'a.jalur_pendaftaran_id')
                        ->join('prodis as c', 'c.kode_prodi', 'a.prodi_id')
                        ->join('kelas_perkuliahans as d', 'd.id', 'a.kelas_id')
                        ->get();
                    if (count($datas) > 0) {
                        foreach ($datas as $key => $value) {
                            $cek_data = PembayaranPendaftaran::where('id_user', $value->user_id)->first();
                            if (!is_null($cek_data)) {
                                if (strtolower($cek_data->status_pembayaran) == 'terbayar') {
                                    $cek_pembayaran_pendaftaran[] = $value;
                                }
                            }
                        };
                    } else {
                        $cek_pembayaran_pendaftaran = [];
                    }
                    return view('admisi::agen.index', compact('agen', 'cek_pembayaran_pendaftaran'));
                }
            }
        } else {
            // dd('anda bukan agen');
            $kode_referral = random_int(100000, 999999);
            Agen::insert([
                'user_id' => auth()->user()->id,
                'kode_referral' => $kode_referral,
            ]);
            return redirect()->to('admin-agen-dashboard');
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
        $validator = Validator::make(
            $request->all(),
            [
                'nik' => ['required', 'unique:mahasiswas,nik','min:14','alpha-num'],
            ],
            [
                'nik.unique' => 'Nomor Induk Kependudukan (NIK) sudah terdaftar',
                'nik.required' => 'Nomor Induk Kependudukan (NIK) harus diisi',
                'nik.min' => 'Nomor Induk Kependudukan (NIK) minimal 14 angka',
            ]
        );

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)->with('error', 'Nomor Induk Kependudukan bermasalah');
        }

        $agen = Agen::where('user_id', auth()->user()->id)->first();
        $agen->nik = $request->nik;
        $agen->update();

        return redirect()->to('admin-agen-dashboard');
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
