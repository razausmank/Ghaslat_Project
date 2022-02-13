<?php

namespace App\Providers;

use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderLog;
use App\Models\OrderProduct;
use App\Models\Page;
use App\Models\Permission;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Role;
use App\Models\User;
use App\Observers\ModelObserver;
use App\Observers\OrderObserver;
use App\Observers\OrderProductObserver;
use App\Observers\PageObserver;
use Illuminate\Notifications\DatabaseNotification;
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
        // User::observe(ModelObserver::class);
        ProductCategory::observe(ModelObserver::class);
        Product::observe(ModelObserver::class);
        // Customer::observe(ModelObserver::class);
        Order::observe(ModelObserver::class );
        Role::observe(ModelObserver::class);
        Permission::observe(ModelObserver::class);
        Order::observe(OrderObserver::class);
        OrderLog::observe(ModelObserver::class);
        //partials._pages_menu
        View::composer('partials._pages_menu', function ($view) {
            $pages = Page::whereNull('parent_page_id')->with('sub_pages')->orderBy('sort_order', 'ASC')->get();
            $view->with('pages', $pages);
        });

        view()->composer('partials._extras.dropdown.notifications', function ($view) {

            $messages_count = DatabaseNotification::where('type', 'App\Notifications\ContactUs')->unread()->count();
            $messages = DatabaseNotification::where('type', 'App\Notifications\ContactUs')->unread()->latest()->take(10)->get();
            $view->with(compact('messages', 'messages_count'));
        });
    }
}
