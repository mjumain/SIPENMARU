<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Psy\Util\Json;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('user-admisi')) {
            return redirect()->to('admisi-dashboard');
        } elseif (auth()->user()->hasRole('admin-admisi')) {
            return redirect()->to('admin-admisi-dashboard');
        } else {
            return view('home');
        }
    }
}
