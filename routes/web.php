<?php

use App\CertificateStudent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {

    Route::group(['namespace' => 'User'], function () {
        Route::get('/', 'HomeController@index')->name('index');
        Route::get('/search', 'HomeController@search')->name('search');
        Route::get('/about', 'HomeController@about')->name('about');
        Route::get('/contact', 'HomeController@contact')->name('contact');
        Route::post('/contact/save', 'HomeController@contactSave')->name('contact.save');
        Route::get('/services', 'ServiceController@index')->name('services');
        Route::get('/services/{service}', 'ServiceController@details')->name('service.details');
        Route::get('/{type}/reset-password', 'UsersController@resetPassword')->name('resetPassword');
        Route::post('/{type}/reset-password', 'UsersController@sendResetPassword')->name('sendResetPassword');
        Route::get('/{type}/reset-password/{code}', 'UsersController@getResetPassword')->name('getResetPassword');
        Route::post('/{type}/reset-password/{code}', 'UsersController@doResetPassword')->name('doResetPassword');
        Route::get('/country/{country}', 'UsersController@getCities')->name('country.cities');
        Route::post('/special-design/special-request', 'SpecialDesignController@saveSpecialRequest')->name('special-design.specialRequest');
        Route::get('/packages', 'PackagesController@packages')->name('packages');

        Route::group(["prefix" => "user"], function () {
            Route::get('/register', 'UsersController@register')->name('user.register')->middleware('check_is_logged');
            Route::post('/register', 'UsersController@store')->name('user.store')->middleware('check_is_logged');
            Route::get('/login', 'UsersController@login')->name('user.login')->middleware('check_is_logged');
            Route::post('/login', 'UsersController@doLogin')->name('user.doLogin')->middleware('check_is_logged');

            Route::group(['middleware' => ['auth', 'active_user']], function () {
                Route::get('/logout', 'UsersController@logout')->name('user.logout');
                Route::get('/profile/view', 'UsersController@profileView')->name('user.profileView')->middleware('has_completed_profile');
                Route::get('/profile', 'UsersController@profile')->name('user.profile');
                Route::post('/update-profile', 'UsersController@updateProfile')->name('user.updateProfile');

                Route::group(["prefix" => "editor", 'middleware' => ['has_completed_profile']], function () {
                    Route::get('/', 'EditorsController@index')->name('editor');
                    Route::post('/editor/save', 'EditorsController@store')->name('editor.save');
                    Route::delete('/{editor}', 'EditorsController@delete')->name('editor.delete');
                    Route::post('/special-request', 'EditorsController@saveSpecialRequest')->name('editor.specialRequest');
                });
            });
        });

        Route::group(['middleware' => ['auth:web,editor', 'active_user', 'active_editor', 'has_completed_profile']], function () {
            Route::get('/home', 'HomeController@home')->name('home');
            Route::get('/change-password', 'UsersController@changePassword')->name('changePassword');
            Route::post('/change-password', 'UsersController@saveChangePassword')->name('updateChangePassword');

            Route::get('/certificate/no', 'CertificatesController@hasNot')->name('certificate.hasNot');
            Route::get('/ads/no', 'AdsController@hasNot')->name('ads.hasNot');

            Route::group([
                "prefix" => "certificate",
                "middleware" => ['has_certificate']
            ], function () {
                Route::get('/', 'CertificatesController@view')->name('certificate');
                Route::post('/save', 'CertificatesController@store')->name('certificate.store');
                Route::get('{certificate}/update', 'CertificatesController@update')->name('certificate.update')->middleware('has_update_certificate');
                Route::post('{certificate}/update', 'CertificatesController@doUpdate')->name('certificate.doUpdate')->middleware('has_update_certificate');
                Route::get('{certificate}/edit', 'CertificatesController@update')->name('certificate.edit')->middleware('has_update_certificate');
                Route::post('/special-request', 'CertificatesController@saveSpecialRequest')->name('certificate.specialRequest');
                Route::get('{certificate}/students', 'CertificatesController@students')->name('certificate.students');
                Route::get('{certificate}/students/save', 'CertificatesController@formStudents')->name('certificate.formStudents');
                Route::post('{certificate}/students/save', 'CertificatesController@saveStudents')->name('certificate.saveStudents');
                Route::get('{certificate}/students/completed', 'CertificatesController@completed')->name('certificate.completed');
                Route::get('/students/{certificateStudent}/export', 'CertificatesController@export')->name('certificate.export');
                Route::get('/students/{certificateStudent}/update', 'CertificatesController@studentUpdate')->name('student.update')->middleware('has_update_certificate');
                Route::post('/students/{certificateStudent}/update', 'CertificatesController@doStudentUpdate')->name('student.doUpdate')->middleware('has_update_certificate');
                Route::delete('/students/{certificateStudent}/delete', 'CertificatesController@deleteCertificate')->name('student.deleteCertificate');
                //middleware('has_balance_certificates')
            });

            Route::group([
                "prefix" => "ads",
                "middleware" => ['has_ads']
            ], function () {
                Route::get('/', 'AdsController@get')->name('ads');
                Route::get('/test', 'AdsController@test')->name('ads.test');
                Route::post('/save', 'AdsController@store')->name('ads.store');
                Route::get('{ads}/update', 'AdsController@update')->name('ads.update');
                Route::post('{ads}/update', 'AdsController@doUpdate')->name('ads.doUpdate');
                Route::get('/{ads}/export', 'AdsController@export')->name('ads.export');
                Route::post('/special-request', 'AdsController@saveSpecialRequest')->name('ads.specialRequest');
            });

            Route::group([
                "prefix" => "package",
                "middleware" => ['has_subscription']
            ], function () {
                Route::get('/', 'PackagesController@index')->name('package');
                Route::post('{package}/subscription', 'PackagesController@subscription')->name('package.subscription');
                Route::get('{package}/payment', 'PackagesController@payment')->name('package.payment');
                Route::post('payment/paypal/charge', 'PackagesController@charge')->name('paypal.charge');
                Route::get('payment/paypal/success', 'PackagesController@payment_success')->name('paypal.success');
            });

            Route::group([
                "prefix" => "payment",
                "middleware" => ['has_subscription']
            ], function () {
                Route::get('/', 'PaymentsController@index')->name('payments');
            });
        });

        Route::get('/certificate/students/{certificateStudent}/export/pdf', 'CertificatesController@exportPDF')->name('certificate.exportPDF');
        Route::get('/certificate/students/{certificateStudent}/share', 'CertificatesController@share')->name('certificate.share');
        Route::get('/certificate/{certificate}/students/{name}/export/pdf', 'CertificatesController@exportPDFByName')->name('certificate.exportPDFByName');
        Route::get('/ads/{ads}/export/pdf', 'AdsController@exportPDF')->name('ads.exportPDF');
        Route::get('/ads/{ads}/share', 'AdsController@share')->name('ads.share');

        Route::group(['middleware' => ['auth', 'active_user', 'has_completed_profile']], function () {
            Route::group(["prefix" => "special-design"], function () {
                Route::get('/', 'SpecialDesignController@index')->name('special-design');
                Route::post('{specialDesign}/save', 'SpecialDesignController@saveSpecialDesign')->name('special-design.save');
            });
        });

        Route::group(["prefix" => "editor"], function () {
            Route::get('/login', 'EditorsController@login')->name('editor.login')->middleware('check_is_logged');
            Route::post('/login', 'EditorsController@doLogin')->name('editor.doLogin');

            Route::group(['middleware' => ['auth:editor', 'active_editor']], function () {
                Route::get('/logout', 'EditorsController@logout')->name('editor.logout');
                Route::get('/profile', 'EditorsController@profile')->name('editor.profile');
                Route::post('/update-profile', 'EditorsController@updateProfile')->name('editor.updateProfile');
            });
        });

        //Route::get('payment/paypal', 'PayPalPaymentController@index')->name('paypal');
        //Route::post('payment/paypal/charge', 'PayPalPaymentController@charge')->name('paypal.charge');
        //Route::get('payment/paypal/success', 'PayPalPaymentController@payment_success')->name('paypal.success');
        //Route::get('payment/paypal/error', 'PayPalPaymentController@payment_error')->name('paypal.error');
    });
});

Route::get("link", function () {
    $target = "/home/shehada_tech/shehada_tech/storage/app/public";
    $shortcut = "/home/shehada_tech/public_html/storage";
    symlink($target, $shortcut);
    echo true;
});

Route::get("test", function () {
    $files = collect(Storage::files('certificates'));
    foreach ($files as $item) {
        $exists = CertificateStudent::where('image', $item)->count();
        if ($exists == 0 && Storage::exists($item)) {
            Storage::delete($item);
        }
    }
    echo 'done';
});
