<?php

namespace Modules\Admisi\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admisi\Entities\Agen;

class DataAgenController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read_agen_admisi_data_agen')->only('index', 'show');
        $this->middleware('permission:create_agen_admisi_data_agen')->only('create', 'store');
        $this->middleware('permission:update_agen_admisi_data_agen')->only('edit', 'update');
        $this->middleware('permission:delete_agen_admisi_data_agen')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agens=Agen::leftjoin('users as a', 'a.id','agens.user_id')->get();
        return view('admisi::agen.admin-data-agen', compact('agens'));
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
