<?php

namespace App\Providers;

use View;
use App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Category;
// use Illuminate\Http\Request; 

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

        View::composer('frontend.layout',function($view){
            $option = array(
                'wa' => env('OPTION_WA'),
                'ig' => env('OPTION_INSTAGRAM'),
                'telp' => env('OPTION_TELP'),
                'email' => env('OPTION_EMAIL'),
            );

            $view->with('categories', Category::latest()->get())->with('option',$option);
        });
        Schema::defaultStringLength(191);
    }
}
