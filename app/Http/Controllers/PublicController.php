<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Wisata;
use App\Models\Event;
use App\Models\Berita;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $banners    = Banner::orderBy('urutan')->get();
        $wisata     = Wisata::where('status_publish', true)->latest()->take(6)->get();
        $umkm       = Umkm::latest()->take(6)->get();
        $events     = Event::where('status', true)->where('tanggal', '>=', now()->toDateString())->orderBy('tanggal')->take(4)->get();
        $berita     = Berita::where('status', true)->latest()->take(3)->get();

        return view('public.home', compact('banners', 'wisata', 'umkm', 'events', 'berita'));
    }

    public function wisata(Request $request)
{
    $query = Wisata::where('status_publish', true)
        ->withAvg('ratings', 'rating')
        ->withCount('ratings');

    if ($request->filled('q')) {
        $query->where('nama', 'like', '%' . $request->q . '%');
    }

    if ($request->filled('kategori')) {
        $query->where('kategori', $request->kategori);
    }

    if ($request->filled('kecamatan')) {
        $query->where('kecamatan', $request->kecamatan);
    }

    $wisata = $query->latest()->paginate(12)->withQueryString();

    $kategoriList = ['Alam', 'Budaya', 'Religi', 'Buatan', 'Edukasi', 'Kuliner', 'Olahraga'];
    $kecamatanList = ['Magetan', 'Maospati', 'Karas', 'Panekan', 'Plaosan', 'Sidorejo', 'Parang', 'Barat', 'Sukomoro', 'Ngariboyo', 'Kartoharjo', 'Kawedanan', 'Takeran', 'Nguntoronadi', 'Lembeyan', 'Bancikan', 'Poncol', 'Karangrejo', 'Satu Atap'];

    return view('public.wisata.index', compact('wisata', 'kategoriList', 'kecamatanList'));
}

public function wisataDetail($slug)
{
    $wisata = Wisata::where('slug', $slug)
        ->where('status_publish', true)
        ->withAvg('ratings', 'rating')
        ->withCount('ratings')
        ->with([
            'ratings' => fn($q) => $q->latest()->with('user'),
            'galleries',
        ])
        ->firstOrFail();

    return view('public.wisata.detail', compact('wisata'));
}

    public function event()
    {
        $events = Event::where('status', true)->orderBy('tanggal')->paginate(9);
        return view('public.event.index', compact('events'));
    }

    public function berita()
    {
        $berita = Berita::where('status', true)->latest()->paginate(9);
        return view('public.berita.index', compact('berita'));
    }

    public function beritaDetail($id)
    {
        $berita = Berita::with('penulis')->where('status', true)->findOrFail($id);
        return view('public.berita.detail', compact('berita'));
    }

    public function tentang()
    {
        return view('public.tentang');
    }
}
