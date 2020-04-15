<?php

namespace App\Http\Middleware;

use App\Area;
use Closure;

class CountryMiddleware
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

        if ($request->is('/')) {
            $area = Area::where('slug', session()->get('area', config()->get('farmersfriend.defaults.area')))->first();

            return redirect()->route('welcome', [$area]);
        }

        return $next($request);
    }
}
