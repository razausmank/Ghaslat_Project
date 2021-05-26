<?php

namespace App\Providers;

use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\User;
use App\Observers\ModelObserver;
use App\Observers\PageObserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // model observers

        Page::observe(ModelObserver::class);
        Page::observe(PageObserver::class);
        User::observe(ModelObserver::class);
        ProductCategory::observe(ModelObserver::class);
        Product::observe(ModelObserver::class);


        //partials._pages_menu
        View::composer('partials._pages_menu', function ($view) {
            $pages = Page::whereNull('parent_page_id')->with('sub_pages')->orderBy('sort_order', 'ASC')->get();
            $view->with('pages', $pages);
        });
    }
}
