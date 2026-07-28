<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WisataRating;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all ratings with their user and wisata relationships, ordered by latest
        $ulasans = WisataRating::with(['user', 'wisata'])->latest()->paginate(15);
        
        return view('admin.ulasan.index', compact('ulasans'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $ulasan = WisataRating::findOrFail($id);
        $ulasan->delete();

        return redirect()->route('admin.ulasan.index')->with('success', 'Ulasan berhasil dihapus.');
    }

    /**
     * Store admin reply to a review.
     */
    public function reply(Request $request, $id)
    {
        $request->validate([
            'admin_reply' => ['required', 'string', 'max:1000'],
        ]);

        $ulasan = WisataRating::findOrFail($id);
        $ulasan->update([
            'admin_reply'      => $request->admin_reply,
            'admin_replied_at' => now(),
        ]);

        return redirect()->route('admin.ulasan.index')->with('success', 'Balasan berhasil dikirim.');
    }
}
