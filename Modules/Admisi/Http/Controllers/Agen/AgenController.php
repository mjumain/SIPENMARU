<?php

namespace Modules\Admisi\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Modules\Admisi\Entities\Agen;
use Modules\Admisi\Entities\Biodata;
use Modules\Admisi\Entities\PembayaranPendaftaran;
use Modules\Admisi\Entities\PembayaranSPP;

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
                    // dd('oke');
                    // $pembayaran = Config::get('database.connections.h2h.database');
                    // dd($database2);

                    // $datas = Biodata::where('refferal', $agen->kode_referral)
                    //     ->join('prodi_has_kelas_jalur_pendaftarans as a', 'a.id', 'has_prodi_kelas_jalur')
                    //     ->join('jalur_pendaftarans as b', 'b.id', 'a.jalur_pendaftaran_id')
                    //     ->join('prodis as c', 'c.kode_prodi', 'a.prodi_id')
                    //     ->join('kelas_perkuliahans as d', 'd.id', 'a.kelas_id')
                    //     ->get();
                    $datas = DB::table('mahasiswas')
                        ->join('h2h.tabel_tagihan_testing', 'mahasiswas.user_id', '=', 'tabel_tagihan_testing.id_user')
                        // ->select('mysql_users.*', 'other_table.column')
                        ->get();
                    // ->join('prodi_has_kelas_jalur_pendaftarans as ', 'a.id', 'has_prodi_kelas_jalur')
                    // ->join('jalur_pendaftarans as b', 'b.id', 'a.jalur_pendaftaran_id')
                    // ->join('prodis as c', 'c.kode_prodi', 'a.prodi_id')
                    // ->join('kelas_perkuliahans as d', 'd.id', 'a.kelas_id')
                    // ->join(DB::connection('h2h')
                    // ->table('tabel_tagihan_testing as b', 'b.id_user', '=', 'a.user_id'))
                    // ->join('h2h.tabel_tagihan_testing as d', 'd.id_user', 'a.user_id')
                    // ->get();



                    dd($datas);
                    return view('admisi::agen.index', compact('agen', 'datas'));
                }
            }
        } else {
            $kode_referral = random_int(100000, 999999);
            Agen::insert([
                'user_id' => auth()->user()->id,
                'kode_referral' => $kode_referral,
            ]);
            // dd('anda bukan agen');
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
