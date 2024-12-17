<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Posts;

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
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        // Chia sẻ bài viết mới nhất cho tất cả các view
        View::composer('*', function ($view) {
            $topPosts = Posts::latest()->take(3)->get(); // Lấy 3 bài viết mới nhất
            $view->with('topPosts', $topPosts);
        });
    }
}