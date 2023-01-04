<?php

namespace App\Providers;

use App\Models\ProductCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        $categoryHelperProvider = ProductCategory::select('category', 'product_count')->orderBy('category', 'asc')->get();
        View::share(compact(
            'categoryHelperProvider'));
    }
}
