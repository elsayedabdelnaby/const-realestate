<?php

namespace App\Http\Middleware;

use App\Models\ContactUsInfo;
use App\Models\SiteSetting;
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
        $site_settings = SiteSetting::firstOrFail();
        View::share('contact_us_info', ContactUsInfo::firstOrFail());
        View::share('logo_path', $site_settings->logo_path);
        View::share('title', $site_settings->title);
        View::share('footer_logo_path', $site_settings->footer_logo_path);

        return $next($request);
    }
}
