<?php

namespace Modules\Admisi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProdiHasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getKelas($kode_prodi)
    {
        $kelas = DB::table('prodi_has_kelas_jalur_pendaftarans as a')->select('c.id','c.kelas_perkuliahan as kelas')->distinct()
            ->join('prodis as b', 'b.kode_prodi', 'a.prodi_id')
            ->join('kelas_perkuliahans as c', 'c.id', 'a.kelas_id')
            ->where('b.kode_prodi', $kode_prodi)
            ->get();
        return response()->json($kelas);
    }
    public function getJalur($kode_prodi, $kelas_id)
    {
        $kelas = DB::table('prodi_has_kelas_jalur_pendaftarans as a')->select('d.id','d.jalur_pendaftaran as jalur')
            ->join('prodis as b', 'b.kode_prodi', 'a.prodi_id')
            ->join('kelas_perkuliahans as c', 'c.id', 'a.kelas_id')
            ->join('jalur_pendaftarans as d', 'd.id', 'a.jalur_pendaftaran_id')
            ->where('a.prodi_id', $kode_prodi)
            ->where('c.id', $kelas_id)
            ->get();
        return response()->json($kelas);
    }
}
