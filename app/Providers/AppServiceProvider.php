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
        //电影主类
        $fatherType = \DB::table('video_type')->where('status',0)->where('pid',0)->get();
        view()->share('fatherType',$fatherType);

        //友情链接
        $friendLink = \DB::table('friend_link')->where('status',0)->get();
        view()->share('friendLink',$friendLink);

        //网站配置
        $webConfig = \DB::table('config')->first();
        view()->share('webConfig',$webConfig);
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
