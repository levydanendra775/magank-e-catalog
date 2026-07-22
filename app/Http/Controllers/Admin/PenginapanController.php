<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penginapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenginapanController extends Controller
{
    public function index()
    {
        $penginapan = Penginapan::latest()->paginate(10);
        return view('admin.penginapan.index', compact('penginapan'));
    }

    public function create()
    {
        return view('admin.penginapan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'jenis'       => 'required|string|max:100',
            'harga_mulai' => 'nullable|numeric',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'alamat'      => 'required|string',
            'maps'        => 'nullable|string',
            'fasilitas'   => 'nullable|string',
            'no_hp'       => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('penginapan', 'public');
        }

        Penginapan::create($validated);

        return redirect()->route('admin.penginapan.index')->with('success', 'Data penginapan berhasil ditambahkan!');
    }

    public function show(Penginapan $penginapan)
    {
        return view('admin.penginapan.show', compact('penginapan'));
    }

    public function edit(Penginapan $penginapan)
    {
        return view('admin.penginapan.edit', compact('penginapan'));
    }

    public function update(Request $request, Penginapan $penginapan)
    {
        $validated = $request->validate([
            'nama'        => 'required|string|max:255',
            'jenis'       => 'required|string|max:100',
            'harga_mulai' => 'nullable|numeric',
            'foto'        => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'alamat'      => 'required|string',
            'maps'        => 'nullable|string',
            'fasilitas'   => 'nullable|string',
            'no_hp'       => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('foto')) {
            if ($penginapan->foto) Storage::disk('public')->delete($penginapan->foto);
            $validated['foto'] = $request->file('foto')->store('penginapan', 'public');
        }

        $penginapan->update($validated);

        return redirect()->route('admin.penginapan.index')->with('success', 'Data penginapan berhasil diperbarui!');
    }

    public function destroy(Penginapan $penginapan)
    {
        if ($penginapan->foto) Storage::disk('public')->delete($penginapan->foto);
        $penginapan->delete();
        return redirect()->route('admin.penginapan.index')->with('success', 'Data penginapan berhasil dihapus!');
    }
}
