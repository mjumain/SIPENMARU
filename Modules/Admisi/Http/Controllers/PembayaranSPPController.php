<?php

namespace Modules\Admisi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admisi\Entities\Biodata;
use Modules\Admisi\Entities\PembayaranSPP;

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
        //
        dd($request->all());
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
