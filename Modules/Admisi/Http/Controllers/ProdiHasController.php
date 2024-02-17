<?php

namespace Modules\Admisi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProdiHasController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read_admisi_biodata')->only('index', 'show');
        $this->middleware('permission:create_admisi_biodata')->only('create', 'store');
        $this->middleware('permission:update_admisi_biodata')->only('edit', 'update');
        $this->middleware('permission:delete_admisi_biodata')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function getKelas($kode_prodi, $jalur_id)
    {
        $kelas = DB::table('prodi_has_kelas_jalur_pendaftarans as a')->select('c.id','c.kelas_perkuliahan as kelas')->distinct()
            ->join('prodis as b', 'b.kode_prodi', 'a.prodi_id')
            ->join('kelas_perkuliahans as c', 'c.id', 'a.kelas_id')
            ->where('b.kode_prodi', $kode_prodi)
            ->where('a.jalur_pendaftaran_id', $jalur_id)
            ->get();
        return response()->json($kelas);
    }
    public function getJalur($kode_prodi)
    {
        $jalur = DB::table('prodi_has_kelas_jalur_pendaftarans as a')->select('d.id','d.jalur_pendaftaran as jalur')->distinct()
            ->join('prodis as b', 'b.kode_prodi', 'a.prodi_id')
            ->join('jalur_pendaftarans as d', 'd.id', 'a.jalur_pendaftaran_id')
            ->where('a.prodi_id', $kode_prodi)
            ->get();
        return response()->json($jalur);
    }

    public function getNpsn(Request $request): JsonResponse
    {
        $data = [];
        if ($request->filled('q')) {
            $data = DB::table('sekolah_indonesia')
                ->where('nama_sekolah', 'LIKE', '%' . $request->get('q') . '%')
                ->where('npsn', 'LIKE', '%' . $request->get('q') . '%')
                ->orWhere('nama_sekolah', 'LIKE', '%' . $request->get('q') . '%')
                ->limit(20)
                ->get();
        }
        return response()->json($data)->header("Access-Control-Allow-Origin",  "*");
    }
}
