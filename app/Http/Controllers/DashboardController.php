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

        // Hanya aplikasi dengan katapp Lokal atau Pusat
        $filteredApps = Application::whereHas('katapp', function ($q) {
            $q->whereIn('kategori_aplikasi', ['Lokal', 'Pusat']);
        })->get();

        // Hitung total, aktif, dan nonaktif hanya dari yang Lokal atau Pusat
        $total = $filteredApps->count();
        $aktif = $filteredApps->where('status', 1)->count();
        $nonaktif = $filteredApps->where('status', 0)->count();

        $opds = Opd::withCount([
            'applications as lokal_count' => function ($query) {
                $query->whereHas('katapp', function ($q) {
                    $q->where('kategori_aplikasi', 'Lokal');
                });
            },
            'applications as pusat_count' => function ($query) {
                $query->whereHas('katapp', function ($q) {
                    $q->where('kategori_aplikasi', 'Pusat');
                });
            },
            'applications as aktif_count' => function ($query) {
                $query->where('status', 1)->whereHas('katapp', function ($q) {
                    $q->whereIn('kategori_aplikasi', ['Lokal', 'Pusat']);
                });
            },
            'applications as nonaktif_count' => function ($query) {
                $query->where('status', 0)->whereHas('katapp', function ($q) {
                    $q->whereIn('kategori_aplikasi', ['Lokal', 'Pusat']);
                });
            }
        ])->get();

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
