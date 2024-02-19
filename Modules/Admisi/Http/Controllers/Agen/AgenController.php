<?php

namespace Modules\Admisi\Http\Controllers\Agen;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admisi\Entities\Agen;

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
                    return view('admisi::agen.index', compact('agen'));
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
