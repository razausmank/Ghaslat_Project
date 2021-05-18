<?php

namespace App\Providers;

use App\Models\Page;
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
         //partials._pages_menu
         View::composer('partials._pages_menu', function($view)
         {
             $pages= Page::whereNull('parent_page_id')->with('sub_pages')->orderBy('sort_order', 'ASC')->get();
             $view->with('pages', $pages );
         });
    }
}
