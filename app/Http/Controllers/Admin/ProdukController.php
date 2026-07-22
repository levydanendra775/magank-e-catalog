<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Umkm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('umkm')->latest()->paginate(10);
        return view('admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $umkm = Umkm::all();
        return view('admin.produk.create', compact('umkm'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'umkm_id'   => 'required|exists:umkms,id',
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'harga'     => 'required|numeric',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'nullable|string',
            'status'    => 'boolean',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $validated['status'] = $request->has('status');

        Produk::create($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Data produk berhasil ditambahkan!');
    }

    public function show(Produk $produk)
    {
        return view('admin.produk.show', compact('produk'));
    }

    public function edit(Produk $produk)
    {
        $umkm = Umkm::all();
        return view('admin.produk.edit', compact('produk', 'umkm'));
    }

    public function update(Request $request, Produk $produk)
    {
        $validated = $request->validate([
            'umkm_id'   => 'required|exists:umkms,id',
            'nama'      => 'required|string|max:255',
            'kategori'  => 'required|string|max:100',
            'harga'     => 'required|numeric',
            'foto'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'nullable|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($produk->foto) {
                Storage::disk('public')->delete($produk->foto);
            }
            $validated['foto'] = $request->file('foto')->store('produk', 'public');
        }

        $validated['status'] = $request->has('status');

        $produk->update($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Data produk berhasil diperbarui!');
    }

    public function destroy(Produk $produk)
    {
        if ($produk->foto) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Data produk berhasil dihapus!');
    }
}
