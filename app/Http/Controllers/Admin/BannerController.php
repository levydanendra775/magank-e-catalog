<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::orderBy('urutan')->paginate(10);
        return view('admin.banner.index', compact('banner'));
    }

    public function create()
    {
        return view('admin.banner.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'  => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
            'link'   => 'nullable|url',
            'urutan' => 'nullable|integer',
        ]);

        $validated['gambar'] = $request->file('gambar')->store('banner', 'public');

        Banner::create($validated);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil ditambahkan!');
    }

    public function show(Banner $banner)
    {
        return view('admin.banner.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'judul'  => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'link'   => 'nullable|url',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('gambar')) {
            if ($banner->gambar) Storage::disk('public')->delete($banner->gambar);
            $validated['gambar'] = $request->file('gambar')->store('banner', 'public');
        }

        $banner->update($validated);

        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil diperbarui!');
    }

    public function destroy(Banner $banner)
    {
        if ($banner->gambar) Storage::disk('public')->delete($banner->gambar);
        $banner->delete();
        return redirect()->route('admin.banner.index')->with('success', 'Banner berhasil dihapus!');
    }
}
