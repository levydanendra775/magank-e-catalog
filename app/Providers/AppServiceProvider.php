<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gunakan 21st.dev / shadcn style untuk tampilan pagination
        Paginator::defaultView('vendor.pagination.custom');
        Paginator::defaultSimpleView('vendor.pagination.custom-simple');

        // Set Carbon locale to Indonesian for translatedFormat
        Carbon::setLocale('id');

        // Share notification activities to admin layout
        view()->composer('layouts.admin', function ($view) {
            $comments = \App\Models\WisataRating::with(['user', 'wisata'])
                ->latest('updated_at')
                ->take(10)
                ->get()
                ->map(function($rating) {
                    $type = 'comment';
                    if (!$rating->komentar && $rating->rating) {
                        $type = 'rating';
                    }
                    return (object) [
                        'type' => $type,
                        'user_name' => $rating->user->name ?? 'Seseorang',
                        'target_name' => $rating->wisata->nama ?? 'Wisata',
                        'message' => $type === 'comment' ? 'mengomentari wisata' : 'memberikan ulasan ' . $rating->rating . ' bintang pada',
                        'time' => $rating->updated_at,
                        'icon' => $type === 'comment' ? 'fa-solid fa-comment' : 'fa-solid fa-star',
                        'icon_color' => $type === 'comment' ? 'var(--primary)' : 'var(--accent)',
                    ];
                });

            $likes = \Illuminate\Support\Facades\DB::table('wishlists')
                ->join('users', 'wishlists.user_id', '=', 'users.id')
                ->join('wisatas', 'wishlists.wisata_id', '=', 'wisatas.id')
                ->select('users.name as user_name', 'wisatas.nama as target_name', 'wishlists.created_at')
                ->whereNotNull('wishlists.created_at')
                ->latest('wishlists.created_at')
                ->take(10)
                ->get()
                ->map(function($like) {
                    return (object) [
                        'type' => 'like',
                        'user_name' => $like->user_name ?? 'Seseorang',
                        'target_name' => $like->target_name ?? 'Wisata',
                        'message' => 'menyukai wisata',
                        'time' => \Carbon\Carbon::parse($like->created_at),
                        'icon' => 'fa-solid fa-heart',
                        'icon_color' => '#dc3545',
                    ];
                });

            $activities = $comments->concat($likes)->sortByDesc('time')->take(10);
            
            $view->with('recentActivities', $activities);
            $view->with('hasUnreadActivities', $activities->count() > 0);
        });
    }
}
