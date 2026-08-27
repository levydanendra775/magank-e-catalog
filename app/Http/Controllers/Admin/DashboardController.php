<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\Event;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'wisata' => Wisata::count(),
            'event'  => Event::where('tanggal', '>=', now()->toDateString())->count(),
            'berita' => Berita::count(),
        ];

        // Chart Data: Wisata per Kecamatan
        $wisataPerKecamatan = Wisata::select('kecamatan', DB::raw('count(*) as total'))
            ->groupBy('kecamatan')
            ->pluck('total', 'kecamatan')->toArray();

        // Chart Data: Event per Bulan (Tahun ini)
        $eventPerBulan = Event::select(DB::raw('DATE_FORMAT(tanggal, "%m") as bulan'), DB::raw('count(*) as total'))
            ->whereRaw('YEAR(tanggal) = ?', [date('Y')])
            ->groupBy('bulan')
            ->pluck('total', 'bulan')->toArray();

        $bulanLabels = ['01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'Mei', '06' => 'Jun', 
                        '07' => 'Jul', '08' => 'Agu', '09' => 'Sep', '10' => 'Okt', '11' => 'Nov', '12' => 'Des'];
        $eventBulanData = [];
        foreach ($bulanLabels as $num => $name) {
            $eventBulanData[] = $eventPerBulan[$num] ?? 0;
        }

        // Ringkasan penambahan bulan ini — untuk badge tren kecil di stat card
        $bulanIni = now()->startOfMonth();
        $trendBulanIni = [
            'wisata' => Wisata::where('created_at', '>=', $bulanIni)->count(),
            'berita' => Berita::where('created_at', '>=', $bulanIni)->count(),
        ];

        return view('admin.dashboard', compact('stats', 'wisataPerKecamatan', 'eventBulanData', 'bulanLabels', 'trendBulanIni'));
    }
}