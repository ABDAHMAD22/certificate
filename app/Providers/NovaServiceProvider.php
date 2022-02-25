<?php

namespace App\Providers;

use App\Nova\Metrics\ContactsPerDay;
use App\Nova\Metrics\NewAds;
use App\Nova\Metrics\NewCertificates;
use App\Nova\Metrics\NewContacts;
use Asalout\Settings\Settings;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;
use Illuminate\Support\Str;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        if ($this->isNovaEndpoint()) {
            app()->setLocale('en');
        }
        Nova::serving(function () {
            app()->setLocale('en');
        });
    }

    /**
     * Check if the current endpoint is a nova related endpoint.
     *
     * @return bool
     */
    private function isNovaEndpoint()
    {
        return Str::startsWith(request()->segment(1), ltrim(config('nova.path'), '/'));
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                //
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [
            (new ContactsPerDay)->width('1/2'),
            (new NewContacts)->width('1/2'),
            (new NewCertificates)->width('1/2'),
            (new NewAds)->width('1/2'),
        ];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        return [];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new Settings(),
        ];
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
