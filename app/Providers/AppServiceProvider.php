<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use View;
use Auth;
use App\Headerfooter;
use DB;

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
         Schema::defaultStringLength(191);

         View::composer('admin.includes.header',function($view){

            $user=Auth::user();
            $header=DB::table('headerfooters')->first();
            $view->with(['users'=>$user,
                          'header'=>$header,

        ]);

         });

         // View::composer('admin.includes.header',function($view){
         //    $header=Headerfooter::find(2);
         //    $view->with('header',$header);
         // });
         View::composer('admin.includes.footer',function($view){
            $header=Headerfooter::find(2);
            $view->with('header',$header);
         });
    }
}
