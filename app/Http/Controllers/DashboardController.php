<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
    public function aplikasi()
    {
        return view('dashboard.aplikasi.d-app', [
            'title' => 'Dashboard Aplikasi'
        ]);
    }

    public function spbe()
    {
        return view('dashboard.spbe.d-spbe', [
            'title' => 'Dashboard SPBE'
        ]);
    }

    public function blank()
    {
        return view('layouts.blank-page');
    }
}
