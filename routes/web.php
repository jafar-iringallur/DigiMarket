<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/home');
});
// Route::get('/getting-started', function () {
//     return view('getting_started');
// })->middleware('auth');

Auth::routes();
Route::get('logout', function(){
    Auth::logout();
    return redirect('/login');
})->name('logout');

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
Route::group(['middleware' => ['GettingStart'],], function () {
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');
});
Route::get('/getting-started', [App\Http\Controllers\HomeController::class, 'gettingStartIndex'])->name('get.start.index');
Route::get('/get-city', [App\Http\Controllers\HomeController::class, 'getCity'])->name('get.city');
Route::post('/upload-logo', [App\Http\Controllers\HomeController::class, 'uploadLogo'])->name('upload.logo');
Route::post('/save-business', [App\Http\Controllers\HomeController::class, 'saveBusiness'])->name('save.business');
Route::get('/check-url', [App\Http\Controllers\HomeController::class, 'checkUrl'])->name('check.url');
Route::post('/save-url', [App\Http\Controllers\HomeController::class, 'saveUrl'])->name('save.url');
