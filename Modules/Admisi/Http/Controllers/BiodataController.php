<?php

namespace Modules\Admisi\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $prodis=Prodi::all();
        // dd($prodis);
        return view('admisi::biodata.index',compact('prodis'));
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
