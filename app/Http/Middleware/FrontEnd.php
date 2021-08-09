<?php

namespace App\Http\Middleware;

use App\Models\ContactUsInfo;
use App\Models\SiteSetting;
use App\Models\SocialFeed;
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
        $social_feeds = SocialFeed::where('display_in_home', 1)->orderBy('created_at', 'desc')->limit(3)->get();
        View::share('contact_us_info', ContactUsInfo::firstOrFail());
        View::share('logo_path', $site_settings->logo_path);
        View::share('title', $site_settings->title);
        View::share('footer_logo_path', $site_settings->footer_logo_path);
        View::share('social_feeds', $social_feeds);

        return $next($request);
    }
}
