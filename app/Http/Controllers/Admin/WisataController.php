<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class WisataController extends Controller
{
    public function index()
    {
        $wisata = Wisata::orderBy('is_pinned', 'desc')->orderBy('pinned_at', 'asc')->orderBy('id', 'asc')->paginate(10);
        return view('admin.wisata.index', compact('wisata'));
    }

    public function create()
    {
        return view('admin.wisata.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'             => 'required|string|max:255',
            'kategori'         => 'required|string|max:100',
            'kecamatan'        => 'required|string|max:100',
            'alamat'           => 'nullable|string',
            'latitude'         => 'nullable|string',
            'longitude'        => 'nullable|string',
            'maps'             => 'nullable|string',
            'harga_tiket'      => 'nullable|numeric',
            'jam_operasional'  => 'nullable|string|max:100',
            'deskripsi'        => 'nullable|string',
            'fasilitas'        => 'nullable|string',
            'thumbnail'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status_publish'   => 'boolean',
        ]);

        $validated['slug'] = Str::slug($request->nama);

        if ($request->hasFile('thumbnail')) {
            $validated['thumbnail'] = $request->file('thumbnail')->store('wisata', 'public');
        }

        $validated['status_publish'] = $request->has('status_publish');

        Wisata::create($validated);

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil ditambahkan!');
    }

    public function show(Wisata $wisatum)
    {
        return view('admin.wisata.show', ['wisata' => $wisatum]);
    }

    public function edit(Wisata $wisatum)
    {
        return view('admin.wisata.edit', ['wisata' => $wisatum]);
    }

    public function update(Request $request, Wisata $wisatum)
    {
        $validated = $request->validate([
            'nama'             => 'required|string|max:255',
            'kategori'         => 'required|string|max:100',
            'kecamatan'        => 'required|string|max:100',
            'alamat'           => 'nullable|string',
            'latitude'         => 'nullable|string',
            'longitude'        => 'nullable|string',
            'maps'             => 'nullable|string',
            'harga_tiket'      => 'nullable|numeric',
            'jam_operasional'  => 'nullable|string|max:100',
            'deskripsi'        => 'nullable|string',
            'fasilitas'        => 'nullable|string',
            'thumbnail'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->nama);

        if ($request->hasFile('thumbnail')) {
            if ($wisatum->thumbnail) {
                Storage::disk('public')->delete($wisatum->thumbnail);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('wisata', 'public');
        }

        $validated['status_publish'] = $request->has('status_publish');

        $wisatum->update($validated);

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil diperbarui!');
    }

    public function destroy(Wisata $wisatum)
    {
        if ($wisatum->thumbnail) {
            Storage::disk('public')->delete($wisatum->thumbnail);
        }

        $wisatum->delete();

        return redirect()->route('admin.wisata.index')->with('success', 'Data wisata berhasil dihapus!');
    }

    public function togglePin(Wisata $wisatum)
    {
        $newPinnedState = !$wisatum->is_pinned;
        $wisatum->update([
            'is_pinned' => $newPinnedState,
            'pinned_at' => $newPinnedState ? now() : null,
        ]);

        $status = $newPinnedState ? 'disematkan' : 'batal disematkan';

        return redirect()->route('admin.wisata.index')
            ->with('success', "Wisata \"" . $wisatum->nama . "\" berhasil $status!");
    }
}
