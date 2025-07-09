<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aplikasi()
    {
        $totalAplikasi = Application::count();
        $aplikasiAktif = Application::where('status', 1)->count();
        $aplikasiNonAktif = Application::where('status', 0)->count();

        return view('dashboard.aplikasi.d-app', [
            'title' => 'Dashboard Aplikasi',
            'totalAplikasi' => $totalAplikasi,
            'aplikasiAktif' => $aplikasiAktif,
            'aplikasiNonAktif' => $aplikasiNonAktif,
        ]);
    }

    public function spbe()
    {
        return view('dashboard.spbe.d-spbe', [
            'title' => 'Dashboard SPBE'
        ]);
    }
}
