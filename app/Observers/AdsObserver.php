<?php

namespace App\Observers;

use App\Ads;
use App\CertificateStudent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AdsObserver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function created(Ads $ads)
    {
        $image = Ads::generateAds($ads);
        $ads->update(['image' => $image, 'is_completed' => true]);
    }

    public function updated(Ads $ads)
    {
        if (!$ads->is_completed) {
            $image = Ads::generateAds($ads);
            $ads->update(['image' => $image, 'is_completed' => true]);
        }
    }

    public function failed(Ads $ads, $exception = null)
    {
        $ads->update(['is_completed' => false]);
    }
}
