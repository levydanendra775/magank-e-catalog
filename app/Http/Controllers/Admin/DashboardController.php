<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\Umkm;
use App\Models\Produk;
use App\Models\Event;
use App\Models\Berita;
use App\Models\Kuliner;
use App\Models\Penginapan;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'wisata'     => Wisata::count(),
            'umkm'       => Umkm::count(),
            'produk'     => Produk::count(),
            'event'      => Event::where('tanggal', '>=', now()->toDateString())->count(),
            'berita'     => Berita::count(),
            'kuliner'    => Kuliner::count(),
            'penginapan' => Penginapan::count(),
        ];

        // Chart Data: Wisata per Kecamatan
        $wisataPerKecamatan = Wisata::select('kecamatan', DB::raw('count(*) as total'))
            ->groupBy('kecamatan')
            ->pluck('total', 'kecamatan')->toArray();

        // Chart Data: Produk per Kategori
        $produkPerKategori = Produk::select('kategori', DB::raw('count(*) as total'))
            ->groupBy('kategori')
            ->pluck('total', 'kategori')->toArray();

        // Chart Data: Event per Bulan (Tahun ini)
        $eventPerBulan = Event::select(DB::raw('strftime("%m", tanggal) as bulan'), DB::raw('count(*) as total'))
            ->whereRaw('strftime("%Y", tanggal) = ?', [date('Y')])
            ->groupBy('bulan')
            ->pluck('total', 'bulan')->toArray();

        $bulanLabels = ['01' => 'Jan', '02' => 'Feb', '03' => 'Mar', '04' => 'Apr', '05' => 'Mei', '06' => 'Jun', 
                        '07' => 'Jul', '08' => 'Agu', '09' => 'Sep', '10' => 'Okt', '11' => 'Nov', '12' => 'Des'];
        $eventBulanData = [];
        foreach ($bulanLabels as $num => $name) {
            $eventBulanData[] = $eventPerBulan[$num] ?? 0;
        }

        return view('admin.dashboard', compact('stats', 'wisataPerKecamatan', 'produkPerKategori', 'eventBulanData', 'bulanLabels'));
    }
}

