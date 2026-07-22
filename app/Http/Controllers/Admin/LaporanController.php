<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use App\Models\Umkm;
use App\Models\Produk;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan.index');
    }

    public function exportWisataPdf()
    {
        $wisata = Wisata::latest()->get();
        $pdf = Pdf::loadView('admin.laporan.pdf_wisata', compact('wisata'));
        return $pdf->download('laporan-wisata-magetan.pdf');
    }

    public function exportUmkmPdf()
    {
        $umkm = Umkm::with('produks')->latest()->get();
        $pdf = Pdf::loadView('admin.laporan.pdf_umkm', compact('umkm'));
        return $pdf->download('laporan-umkm-magetan.pdf');
    }

    public function exportWisataExcel()
    {
        $wisata = Wisata::latest()->get();
        
        $filename = "laporan-wisata-magetan.csv";
        $handle = fopen('php://memory', 'w');
        
        // Add UTF-8 BOM for Excel compatibility
        fputs($handle, "\xEF\xBB\xBF");
        
        fputcsv($handle, ['No', 'Nama Wisata', 'Kategori', 'Kecamatan', 'Alamat', 'Harga Tiket', 'Status']);

        foreach ($wisata as $index => $w) {
            fputcsv($handle, [
                $index + 1,
                $w->nama,
                $w->kategori,
                $w->kecamatan,
                $w->alamat,
                $w->harga_tiket,
                $w->status_publish ? 'Publish' : 'Draft'
            ]);
        }
        
        fseek($handle, 0);
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->stream(function() use ($handle) {
            fpassthru($handle);
            fclose($handle);
        }, 200, $headers);
    }

    public function exportUmkmExcel()
    {
        $umkm = Umkm::latest()->get();
        
        $filename = "laporan-umkm-magetan.csv";
        $handle = fopen('php://memory', 'w');
        
        // Add UTF-8 BOM for Excel compatibility
        fputs($handle, "\xEF\xBB\xBF");
        
        fputcsv($handle, ['No', 'Nama UMKM', 'Pemilik', 'Kecamatan', 'Alamat', 'No HP']);

        foreach ($umkm as $index => $u) {
            fputcsv($handle, [
                $index + 1,
                $u->nama,
                $u->pemilik,
                $u->kecamatan,
                $u->alamat,
                $u->no_hp
            ]);
        }
        
        fseek($handle, 0);
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        return response()->stream(function() use ($handle) {
            fpassthru($handle);
            fclose($handle);
        }, 200, $headers);
    }
}
