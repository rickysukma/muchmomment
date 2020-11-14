<?php

namespace App\Providers;

use View;
use App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Category;
use App\Option;
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
            $opt = Option::findOrfail(1)->first();
            $option = array(
                'wa' => $opt->whatsapp,
                'ig' => $opt->instagram,
                'telp' => $opt->telepon,
                'email' => $opt->email,
            );

            $view->with('categories', Category::latest()->get())->with('option',$option);
        });
        Schema::defaultStringLength(191);
    }
}
