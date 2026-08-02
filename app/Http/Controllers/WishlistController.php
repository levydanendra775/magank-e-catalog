<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function toggle(Wisata $wisata)
    {
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Silakan login terlebih dahulu untuk menyukai wisata.',
                'redirect' => route('login'),
            ], 401);
        }

        $user = auth()->user();
        $exists = $wisata->wishlistedBy()->where('user_id', $user->id)->exists();

        if ($exists) {
            $wisata->wishlistedBy()->detach($user->id);
            $status = false;
        } else {
            $wisata->wishlistedBy()->attach($user->id);
            $status = true;
        }

        $totalLikes = $wisata->wishlistedBy()->count();
        $userWishlistCount = $user->wishlist()->count();

        return response()->json([
            'success' => true,
            'wishlisted' => $status,
            'total_likes' => $totalLikes,
            'user_count' => $userWishlistCount,
            'message' => $status ? 'Destinasi berhasil ditambahkan ke daftar disukai!' : 'Destinasi dihapus dari daftar disukai.'
        ]);
    }

    public function index()
    {
        $user = auth()->user();
        $wishlist = $user->wishlist()
            ->where('status_publish', true)
            ->withAvg('ratings', 'rating')
            ->withCount('ratings')
            ->latest('wishlists.created_at')
            ->paginate(12);

        return view('public.wisata.wishlist', compact('wishlist'));
    }
}