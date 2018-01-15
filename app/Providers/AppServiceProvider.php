<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Model\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //XXXXXXXXXXXXXXXXXX
        // if(session('user'))
        // {
        // dd(session('user'));
            // $res = User::where('username',session('user'))->first();
            // dd($res);
            // $pic = $res -> userinfo -> pic;
            // view()->share('pic','http://p2duy5ziy.bkt.clouddn.com/55cb654eb9870ad702b6ac93bc1b31c8.png');
        // }
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
