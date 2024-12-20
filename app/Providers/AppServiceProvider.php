<?php

namespace App\Providers;

use App\Http\Filters\PostFilter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use App\Models\Post;
use App\Http\Requests\Post\FilterRequest;

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
    public function boot(FilterRequest $request): void
    {
        Paginator::defaultView('vendor.pagination.bootstrap-4');

        View::composer(['includes.admin.sidebar','admin.post.index'], function ($view) use ($request){
            $data = $request->validated();
            $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)->paginate(100);
        $view->with('posts', $posts);
    });
    }
}
