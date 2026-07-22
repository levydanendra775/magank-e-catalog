<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UmkmController extends Controller
{
    public function index()
    {
        $umkm = Umkm::latest()->paginate(10);
        return view('admin.umkm.index', compact('umkm'));
    }

    public function create()
    {
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'pemilik'   => 'required|string|max:255',
            'no_hp'     => 'required|string|max:20',
            'alamat'    => 'required|string',
            'kecamatan' => 'required|string|max:100',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('umkm', 'public');
        }

        Umkm::create($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil ditambahkan!');
    }

    public function show(Umkm $umkm)
    {
        return view('admin.umkm.show', compact('umkm'));
    }

    public function edit(Umkm $umkm)
    {
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, Umkm $umkm)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'pemilik'   => 'required|string|max:255',
            'no_hp'     => 'required|string|max:20',
            'alamat'    => 'required|string',
            'kecamatan' => 'required|string|max:100',
            'logo'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('logo')) {
            if ($umkm->logo) {
                Storage::disk('public')->delete($umkm->logo);
            }
            $validated['logo'] = $request->file('logo')->store('umkm', 'public');
        }

        $umkm->update($validated);

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil diperbarui!');
    }

    public function destroy(Umkm $umkm)
    {
        if ($umkm->logo) {
            Storage::disk('public')->delete($umkm->logo);
        }

        $umkm->delete();

        return redirect()->route('admin.umkm.index')->with('success', 'Data UMKM berhasil dihapus!');
    }
}
