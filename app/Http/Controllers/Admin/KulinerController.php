<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuliner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KulinerController extends Controller
{
    public function index()
    {
        $kuliner = Kuliner::latest()->paginate(10);
        return view('admin.kuliner.index', compact('kuliner'));
    }

    public function create()
    {
        return view('admin.kuliner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'alamat'       => 'required|string',
            'maps'         => 'nullable|string',
            'menu_unggulan'=> 'nullable|string|max:255',
            'jam_buka'     => 'nullable|string|max:100',
            'no_hp'        => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('kuliner', 'public');
        }

        Kuliner::create($validated);

        return redirect()->route('admin.kuliner.index')->with('success', 'Data kuliner berhasil ditambahkan!');
    }

    public function show(Kuliner $kuliner)
    {
        return view('admin.kuliner.show', compact('kuliner'));
    }

    public function edit(Kuliner $kuliner)
    {
        return view('admin.kuliner.edit', compact('kuliner'));
    }

    public function update(Request $request, Kuliner $kuliner)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'foto'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'alamat'       => 'required|string',
            'maps'         => 'nullable|string',
            'menu_unggulan'=> 'nullable|string|max:255',
            'jam_buka'     => 'nullable|string|max:100',
            'no_hp'        => 'nullable|string|max:20',
        ]);

        if ($request->hasFile('foto')) {
            if ($kuliner->foto) Storage::disk('public')->delete($kuliner->foto);
            $validated['foto'] = $request->file('foto')->store('kuliner', 'public');
        }

        $kuliner->update($validated);

        return redirect()->route('admin.kuliner.index')->with('success', 'Data kuliner berhasil diperbarui!');
    }

    public function destroy(Kuliner $kuliner)
    {
        if ($kuliner->foto) Storage::disk('public')->delete($kuliner->foto);
        $kuliner->delete();
        return redirect()->route('admin.kuliner.index')->with('success', 'Data kuliner berhasil dihapus!');
    }
}
