<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\Opd;
use App\Models\Katapp;

use Illuminate\Database\Eloquent\Model;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aplikasi()
    {
        $applications = Application::all();
        $opds = Opd::withCount([
            'applications as lokal_count' => function ($query) {
                $query->whereHas('katapp', function ($q) {
                    $q->where('nama', 'Lokal');
                });
            },
            'applications as pusat_count' => function ($query) {
                $query->whereHas('katapp', function ($q) {
                    $q->where('nama', 'Pusat');
                });
            },
            'applications as aktif_count' => function ($query) {
                $query->where('status', 1);
            },
            'applications as nonaktif_count' => function ($query) {
                $query->where('status', 0);
            }
        ])->get();

        // Tambahan hitungan total
        $total = $applications->count();
        $aktif = $applications->where('status', 1)->count();
        $nonaktif = $applications->where('status', 0)->count();


        return view('dashboard.aplikasi.d-app', compact('applications', 'opds', 'total', 'aktif', 'nonaktif'), [
            'title' => 'Dashboard Aplikasi',
        ]);
    }

    public function spbe()
    {
        return view('dashboard.spbe.d-spbe', [
            'title' => 'Dashboard SPBE'
        ]);
    }
}
