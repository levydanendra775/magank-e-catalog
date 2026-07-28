<?php
namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function toggle(Wisata $wisata)
    {
        $exists = $wisata->wishlistedBy()->where('user_id', auth()->id())->exists();

        if ($exists) {
            $wisata->wishlistedBy()->detach(auth()->id());
            $status = false;
        } else {
            $wisata->wishlistedBy()->attach(auth()->id());
            $status = true;
        }

        return response()->json(['wishlisted' => $status]);
    }

    public function index()
    {
        $wishlist = auth()->user()->wishlist()->withAvg('ratings', 'rating')->get();
        return view('wishlist.index', compact('wishlist'));
    }
}