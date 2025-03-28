<?php
use App\Http\Controllers\Company\Auth\CompanyLoginController;
use App\Http\Controllers\Company\Auth\CompanyRegisterController;
use App\Http\Controllers\Company\CompanyController;
use App\Http\Controllers\Company\DashboardController;
use App\Http\Controllers\Company\JobController;
use Illuminate\Support\Facades\Route;


Route::get('/', function() {
    return redirect()->route('company.login.form');
}); 

Route::middleware('company.guest')->group(function() {
    Route::controller(CompanyRegisterController::class)->group(function(){
        Route::get('registration', 'registrationForm')->name('registration.form');
        Route::post('registration', 'registration')->name('registration.post');

        Route::get('auth/google','redirectToGoogle')->name('auth.google');
        Route::get('auth/google/callback', 'handleGoogleCallback');
   });

    Route::controller(CompanyLoginController::class)->group(function(){

        Route::get('login', 'loginForm')->name('login.form');
        Route::post('login', 'login')->name('login.post');
     

        Route::get('password/reset', 'showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'sendResetLinkEmail');

        Route::get('password/reset/{token}', 'showResetForm')->name('password.reset');
        Route::post('password/reset', 'reset')->name('password.request.sore');

        Route::get('new-password/{id}', 'newPasswordForm')->name('password.newPassword');
        Route::post('password/set-password/{id}', 'sepPassword')->name('password.setPassword');
   });
});


Route::middleware('company.auth')->group(function() {
    Route::controller(CompanyLoginController::class)->group(function(){
        Route::get('logout', 'logout')->name('logout');
    });

    Route::controller(DashboardController::class)->name('dashboard.')->group(function(){
        Route::get('dashboard', 'index')->name('index');
    });

    Route::controller(CompanyController::class)->name('details.')->group(function(){
        Route::get('details', 'detail')->name('detail');
        Route::post('detail/store', 'detailStore')->name('detail.store');
        Route::post('detail/contact', 'contactStore')->name('contact.store');
    });
});

Route::middleware(['company.auth', 'company.job.status'])->group(function() {
    Route::controller(JobController::class)->name('jobs.')->prefix('jobs')->group(function(){
        Route::match(['get','patch'],'list', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('edit/{id}', 'edit')->name('edit');
         Route::put('update/{id}', 'update')->name('update');
        Route::delete('delete/{id}', 'destroy')->name('destroy');
    });
});

Route::fallback(function () {
    return response()->view('admin.errors.404', [], 404);
});