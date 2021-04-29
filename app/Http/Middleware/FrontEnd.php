<?php

namespace App\Http\Middleware;

use App\Models\ContactUsInfo;
use Illuminate\Support\Facades\View;
use Closure;

class FrontEnd
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
        View::share('contact_us_info', ContactUsInfo::firstOrFail());
        return $next($request);
    }
}
