<?php

namespace Modules\Admisi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Modules\Admisi\Entities\Admin\ProdiAdmisi;
use Modules\Admisi\Entities\Biodata;
use Modules\Admisi\Entities\Prodi;

class BiodataController extends Controller
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
    public function index()
    {
        $prodis = ProdiAdmisi::orderBy('nama_prodi', 'asc')->get();
        return view('admisi::biodata.index', compact('prodis'));
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
        $requestfield = array(
            // 'kode_prodi' => ['required'],
            // 'jalur_id' => ['required'],
            // 'kelas_id' => ['required'],
            // 'nama_lengkap' => ['required'],
            // 'nik' => ['required', 'unique:mahasiswa,nik'],
            // 'nisn' => ['required', 'unique:mahasiswa,nisn'],
            // 'npsn' => ['required'],
            // 'email' => ['required'],
            // 'nomor_whatsapp' => ['required'],
            // 'kk' => ['required', 'mimes:jpeg,jpg,png,pdf'],
            // 'ktp' => ['required', 'mimes:jpeg,jpg,png,pdf'],
            // 'ijazah' => ['required', 'mimes:jpeg,jpg,png,pdf'],
            // 'pendukung' => ['mimes:jpeg,jpg,png,pdf'],
        );

        $rule = array(
            'kode_prodi.required' => 'Program Studi belum dipilih',
            'jalur_id.required' => 'Jalur Pendaftaran belum dipilih',
            'kelas_id.required' => 'Kelas Perkuliahan belum dipilih',

            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'nik.required' => 'Nomor Induk Kependudukan (NIK) harus diisi',
            'nisn.required' => 'Nomor Induk Siswa Nasional (NISN) harus diisi',
            'npsn.required' => 'Nomor Pokok Siswa Nasional (NPSN) harus diisi',
            'nomor_whatsapp.required' => 'Nomor WhatsApp/Handphone harus diisi',

            'ktp.required' => 'Scan Kartu Tanda Penduduk (KTP) harus diisi',
            'kk.required' => 'Scan Kartu Keluarga (KK) harus diisi',
            'ijazah.required' => 'Scan Ijazah/Surat Keterangan Lulus (SKL) harus diisi',

            'ktp.mimes' => 'Tipe File yng diizinkan hanya .pdf, .png, .jpeg, .jpg',
            'kk.mimes' => 'Tipe File yng diizinkan hanya .pdf, .png, .jpeg, .jpg',
            'ijazah.mimes' => 'Tipe File yng diizinkan hanya .pdf, .png, .jpeg, .jpg',
            'pendukung.mimes' => 'Tipe File yng diizinkan hanya .pdf, .png, .jpeg, .jpg',
        );

        $validator = Validator::make($request->all(), $requestfield, $rule);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator)->with('error', 'Periksa kembali biodata anda');
        }

        try {
            $id_has_prodi_jalur_kelas = DB::table('prodi_has_kelas_jalur_pendaftarans')
                ->where('prodi_id', $request->kode_prodi)
                ->where('kelas_id', $request->kelas_id)
                ->where('jalur_pendaftaran_id', $request->jalur_id)
                ->first();

            $biodata = Biodata::updateOrcreate([
                'user_id' => Auth::user()->id,
            ], [
                'has_prodi_kelas_jalur' => $id_has_prodi_jalur_kelas->id,
                'nama_mahasiswa' => $request->nama_lengkap,
                'nomor_registrasi_kipk' => ($request->jalur_id == 5) ? $request->jalur_id : null,
                'nisn' => $request->nisn,
                'npsn' => $request->npsn,
                'nik' => $request->nik,
                'hp' => $request->nomor_whatsapp,
                'refferal' => $request->kode_refferal,
                'validasi_admisi' => null,
                'validasi_akademik' => null,
            ]);

            if ($request->hasFile('kk')) {
                $newname = explode('.', round(microtime(true)));
                $extension = $request->file('kk')->getClientOriginalExtension();
                $filenameSimpan = $newname[0] . '.' . $extension;
                $pathkk = $request->file('kk')->storeAs('public/kk', $filenameSimpan);

                $filekk = Biodata::find($biodata->id);
                $filekk->kk = 'kk/' . $filenameSimpan;
                $filekk->update();
            }
            if ($request->hasFile('ktp')) {
                $newname = explode('.', round(microtime(true)));
                $extension = $request->file('ktp')->getClientOriginalExtension();
                $filenameSimpan = $newname[0] . '.' . $extension;
                $pathktp = $request->file('ktp')->storeAs('public/ktp', $filenameSimpan);

                $filektp = Biodata::find($biodata->id);
                $filektp->ktp = 'ktp/' . $filenameSimpan;
                $filektp->update();
            }
            if ($request->hasFile('ijazah')) {
                $newname = explode('.', round(microtime(true)));
                $extension = $request->file('ijazah')->getClientOriginalExtension();
                $filenameSimpan = $newname[0] . '.' . $extension;
                $pathijazah = $request->file('ijazah')->storeAs('public/ijazah', $filenameSimpan);

                $fileijazah = Biodata::find($biodata->id);
                $fileijazah->ijazah = 'ijazah/' . $filenameSimpan;
                $fileijazah->update();
            }
            if ($request->hasFile('pendukung')) {
                $newname = explode('.', round(microtime(true)));
                $extension = $request->file('pendukung')->getClientOriginalExtension();
                $filenameSimpan = $newname[0] . '.' . $extension;
                $pathpendukung = $request->file('pendukung')->storeAs('public/pendukung', $filenameSimpan);

                $filependukung = Biodata::find($biodata->id);
                $filependukung->pendukung = 'pendukung/' . $filenameSimpan;
                $filependukung->update();
            }
            return redirect()->route('admisi-biodata.index')->with('success', 'Biodata berhasil di perbarui');
        } catch (\Throwable $th) {
            return back()->withInput()->withErrors($validator)->with('error', 'Periksa kembali biodata anda');
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
