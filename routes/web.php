<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HospitalController;
// use App\Http\Middleware\BloodSample;
use App\Http\Middleware\Logincheck;

Route::get('/', function () {
    return view('welcome');
});
Route::post('/register', [UserController::class, 'register'])->name('registeruser');

Route::get('/create_account', function () {
    return view('auth.register');})->name('register');

Route::get('/login_as_hospital', function () {
    return view('auth.hospitallogin');
})->name('login.as.hospital');

Route::get('/login_to_dashboard', function () {
    return view('auth.login');
})->name('logindashboard');

Route::get('/blood-samples', [HospitalController::class, 'ViewSamples'])->name('bloodsamples');


// Route::middleware(['auth'])->group(function () {
  
   
    Route::any('/dashboard', [UserController::class, 'login'])->name('login');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/dashboard/add_blood_sample', function () {
        return view('hospital.addbloodsample');
    })->name('addbloodsample');

    Route::post('/blood-samples-store', [HospitalController::class, 'store'])
    ->name('blood-samples.store');
// });





