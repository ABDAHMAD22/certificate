<?php

namespace App\Observers;

use App\CertificateStudent;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CertificateStudentObserver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//    use DispatchesJobs;

    /**
     * Handle the certificate student "created" event.
     *
     * @param \App\CertificateStudent $certificateStudent
     * @return void
     */
    public function created(CertificateStudent $certificateStudent)
    {
            $image = CertificateStudent::generateCertificate($certificateStudent);
            $certificateStudent->update(['image' => $image, 'is_completed' => true]);
    }

    /**
     * Handle the certificate student "updated" event.
     *
     * @param \App\CertificateStudent $certificateStudent
     * @return void
     */
    public function updated(CertificateStudent $certificateStudent)
    {
        if (!$certificateStudent->is_completed) {
            $image = CertificateStudent::generateCertificate($certificateStudent);
            $certificateStudent->update(['image' => $image, 'is_completed' => true]);
        }
    }

    public function failed(CertificateStudent $certificateStudent, $exception = null)
    {
        $certificateStudent->update(['is_completed' => true]);
    }

    /**
     * Handle the certificate student "deleted" event.
     *
     * @param \App\CertificateStudent $certificateStudent
     * @return void
     */
    public function deleted(CertificateStudent $certificateStudent)
    {
        //
    }

    /**
     * Handle the certificate student "restored" event.
     *
     * @param \App\CertificateStudent $certificateStudent
     * @return void
     */
    public function restored(CertificateStudent $certificateStudent)
    {
        //
    }

    /**
     * Handle the certificate student "force deleted" event.
     *
     * @param \App\CertificateStudent $certificateStudent
     * @return void
     */
    public function forceDeleted(CertificateStudent $certificateStudent)
    {
        //
    }
}
