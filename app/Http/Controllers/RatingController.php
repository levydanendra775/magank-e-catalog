<?php
namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\WisataRating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Store a new rating (if user has not rated yet).
     */
    public function store(Request $request, Wisata $wisata)
    {
        $request->validate([
            'rating'   => ['required', 'integer', 'min:1', 'max:5'],
            'komentar' => ['nullable', 'string', 'max:1000'],
        ]);

        $wisata->ratings()->updateOrCreate(
            ['user_id' => auth()->id()],
            ['rating' => $request->rating, 'komentar' => $request->komentar]
        );

        return redirect()->route('public.wisata.detail', $wisata->slug)
                         ->withFragment('ulasan')
                         ->with('status', 'Ulasan berhasil disimpan!');
    }

    /**
     * Update user's existing rating.
     */
    public function update(Request $request, Wisata $wisata)
    {
        $request->validate([
            'rating'   => ['required', 'integer', 'min:1', 'max:5'],
            'komentar' => ['nullable', 'string', 'max:1000'],
        ]);

        $rating = WisataRating::where('wisata_id', $wisata->id)
                               ->where('user_id', auth()->id())
                               ->firstOrFail();

        $rating->update([
            'rating'   => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return redirect()->route('public.wisata.detail', $wisata->slug)
                         ->withFragment('ulasan')
                         ->with('status', 'Ulasan berhasil diperbarui!');
    }

    /**
     * Delete user's own rating.
     */
    public function destroy(Wisata $wisata)
    {
        WisataRating::where('wisata_id', $wisata->id)
                    ->where('user_id', auth()->id())
                    ->delete();

        return redirect()->route('public.wisata.detail', $wisata->slug)
                         ->withFragment('ulasan')
                         ->with('status', 'Ulasan berhasil dihapus!');
    }

    /**
     * Toggle like on a rating (session-based, one like per user per rating).
     */
    public function like(WisataRating $rating)
    {
        $userId = auth()->id();
        $sessionKey = 'liked_rating_' . $rating->id . '_' . $userId;

        if (session()->has($sessionKey)) {
            // Unlike
            session()->forget($sessionKey);
            $rating->decrement('likes');
            $liked = false;
        } else {
            // Like
            session()->put($sessionKey, true);
            $rating->increment('likes');
            $liked = true;
        }

        return response()->json([
            'likes' => $rating->fresh()->likes,
            'liked' => $liked,
        ]);
    }
}