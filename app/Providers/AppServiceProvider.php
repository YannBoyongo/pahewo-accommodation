<?php

namespace App\Providers;

use App\Models\HeroSection;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $managedViews = [
            'pages.home' => 'home',
            'pages.rooms' => 'rooms',
            'pages.room-detail' => 'rooms',
            'pages.dining' => 'dining',
            'pages.conference-meeting' => 'conference-meeting',
            'pages.contact' => 'contact',
            'pages.about-pahewo' => 'about-pahewo',
            'pages.experiences' => 'experiences',
            'pages.privacy' => 'privacy',
        ];

        foreach ($managedViews as $viewName => $pageSlug) {
            View::composer($viewName, function ($view) use ($pageSlug): void {
                $view->with('pageContent', Page::managed($pageSlug));
            });
        }

        View::composer([
            'components.layouts.app',
            'components.layouts.home',
            'components.hero',
            'components.public-header',
        ], function ($view): void {
            $view->with('siteSettings', Setting::instance());

            if ($view->name() === 'components.hero') {
                $view->with('heroSection', HeroSection::instance());
            }
        });
    }
}
