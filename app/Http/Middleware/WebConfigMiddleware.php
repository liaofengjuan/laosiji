<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Config;

class WebConfigMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $res = Config::where('id',1)->first();
        if($res['status'] == '1')
        {
            return redirect('/webclose');   
        }
        return $next($request);
    }
}
