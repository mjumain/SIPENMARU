<?php

namespace Modules\Admisi\Http\Controllers\Admin;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Admisi\Entities\Admin\HasPKJAdminAdmisi;

class HasPKJAdminAdmisiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $prodis = DB::table('prodis')->get();
        $kelass = DB::table('kelas_perkuliahans')->get();
        $jalur_pendaftarans = DB::table('jalur_pendaftarans')->get();

        $prokejas = DB::table('prodi_has_kelas_jalur_pendaftarans as a')
            ->join('prodis as b', 'b.kode_prodi', 'a.prodi_id')
            ->join('kelas_perkuliahans as c', 'c.id', 'a.kelas_id')
            ->join('jalur_pendaftarans as d', 'd.id', 'a.jalur_pendaftaran_id')
            ->orderBy('a.id', 'asc')
            ->get();
        return view('admisi::prokeja.index', compact('prokejas', 'prodis', 'kelass', 'jalur_pendaftarans'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admisi::prokeja.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        try {
            $cek_data = DB::table('prodi_has_kelas_jalur_pendaftarans')
                ->where('prodi_id', $request->kode_prodi)
                ->where('kelas_id', $request->kelas_id)
                ->where('jalur_pendaftaran_id', $request->jalur_pendaftaran_id)
                ->first();
            if (is_null($cek_data)) {
                HasPKJAdminAdmisi::create([
                    'prodi_id' => $request->kode_prodi,
                    'kelas_id' => $request->kelas_id,
                    'jalur_pendaftaran_id' => $request->jalur_pendaftaran_id
                ]);
                toastr()->success('PROKEJA berhasil disimpan');
            } else {
                toastr()->error('PROKEJA gagal disimpan');
            }
            return redirect()->route('admin-admisi-prokeja.index');
        } catch (\Throwable $th) {
            toastr()->warning('Ada masalah di server');
            return redirect()->route('admin-admisi-prokeja.index');
        }
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
