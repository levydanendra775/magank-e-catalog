<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('penulis')->latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'isi'       => 'required|string',
            'status'    => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('berita', 'public');
        }

        $validated['penulis_id'] = auth()->id();
        $validated['status']     = $request->has('status');

        Berita::create($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function show(Berita $beritum)
    {
        return view('admin.berita.show', ['berita' => $beritum]);
    }

    public function edit(Berita $beritum)
    {
        return view('admin.berita.edit', ['berita' => $beritum]);
    }

    public function update(Request $request, Berita $beritum)
    {
        $validated = $request->validate([
            'judul'     => 'required|string|max:255',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'isi'       => 'required|string',
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($beritum->thumbnail) Storage::disk('public')->delete($beritum->thumbnail);
            $validated['thumbnail'] = $request->file('thumbnail')->store('berita', 'public');
        }

        $validated['status'] = $request->has('status');

        $beritum->update($validated);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $beritum)
    {
        if ($beritum->thumbnail) Storage::disk('public')->delete($beritum->thumbnail);
        $beritum->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus!');
    }
}
