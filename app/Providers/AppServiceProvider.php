<?php

namespace App\Providers;

use App\Ads;
use App\CertificateStudent;
use App\Observers\AdsObserver;
use App\Observers\CertificateStudentObserver;
use App\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        try {
            $dataItems = [
                'bodyClass' => '',
                'activeClass' => '',
                'authLayout' => false,
                'withoutHeader' => false,
                'settings' => Setting::get()->pluck('value', 'key'),
            ];
            View::share($dataItems);
        } catch (\Exception $ex) {
        }
        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
        }

        CertificateStudent::observe(CertificateStudentObserver::class);
        Ads::observe(AdsObserver::class);
    }
}
