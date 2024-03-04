<?php

namespace Modules\Admisi\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admisi\Entities\Biodata;
use Modules\Admisi\Entities\PembayaranPendaftaran;
use Modules\Admisi\Entities\PembayaranSPP;

class DataMahasiswaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read_admin_admisi_data_mahasiswa')->only('index', 'show');
        $this->middleware('permission:create_admin_admisi_data_mahasiswa')->only('create', 'store');
        $this->middleware('permission:update_admin_admisi_data_mahasiswa')->only('edit', 'update');
        $this->middleware('permission:delete_admin_admisi_data_mahasiswa')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data_mahasiswa = Biodata::join('prodi_has_kelas_jalur_pendaftarans as a', 'a.id', 'has_prodi_kelas_jalur')
            ->join('jalur_pendaftarans as b', 'b.id', 'a.jalur_pendaftaran_id')
            ->join('prodis as c', 'c.kode_prodi', 'a.prodi_id')
            ->join('kelas_perkuliahans as d', 'd.id', 'a.kelas_id')
            ->get();
        if (count($data_mahasiswa) > 0) {

            foreach ($data_mahasiswa as $value) {
                $add = [];
                $pembayaran = PembayaranPendaftaran::where('id_user', $value->user_id)->get();
                if (count($pembayaran) > 0) {
                    foreach ($pembayaran as $key) {
                        $add['pembayaran'][] = $key->toarray();
                    }
                    $cetak[] = array_merge($value->toArray(), $add);
                } else {
                    $cetak[] = array_merge($value->toArray(), ['pembayaran' => []]);
                }
            }
        } else {
            $cetak = [];
        }
        // dd($cetak);
        return view('admisi::biodata.admin-mahasiswa', compact('cetak'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admisi::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admisi::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admisi::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
