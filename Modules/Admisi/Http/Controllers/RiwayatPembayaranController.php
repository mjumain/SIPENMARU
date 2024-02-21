<?php

namespace Modules\Admisi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admisi\Entities\Biodata;
use Modules\Admisi\Entities\RiwayatPembayaran;

class RiwayatPembayaranController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read_admisi_riwayat_pembayaran')->only('index', 'show');
        $this->middleware('permission:create_admisi_riwayat_pembayaran')->only('create', 'store');
        $this->middleware('permission:update_admisi_riwayat_pembayaran')->only('edit', 'update');
        $this->middleware('permission:delete_admisi_riwayat_pembayaran')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = RiwayatPembayaran::where('id_user', auth()->user()->id)->get();
        $biodata = Biodata::where('user_id', auth()->user()->id)->first();
        return view('admisi::riwayat.index', compact('biodata', 'pembayaran'));
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
