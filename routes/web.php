<?php

use App\Http\Controllers\AdminsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('/','pages.index')->name('pages.index');

Auth::routes();

Route::post('registration',[RegisterController::class,'handledRegistration'])->name('regination');

Route::post('director',[LoginController::class, 'logination'])->name('loginator');


Route::prefix('admins')->group(fn() =>[
    Route::controller(AdminsController::class)->group(fn() => [
        Route::get('dashboard','index')->name('admins.index'),
        Route::get('all-users', 'allusers')->name('admins.users'),
    ]),
]);

Route::prefix('users')->group(function () {
    Route::resource('articles',ArticlesController::class);
    Route::controller(HomeController::class)->group(function(){
    Route::get('home','index')->name('home');
    Route::get('profile','profile')->name('users.profile');
    Route::post('udateMobile','updatemobile')->name('mobileUpdate');
    Route::post('avatar','avatarUpdate')->name('avatarUpdate');
    Route::post('contacts','contactsAddress')->name('contacts.users');
    });
});
