<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $fatherType = \DB::table('video_type')->where('status',0)->where('pid',0)->get();
        view()->share('fatherType',$fatherType);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    
        
    }
}
