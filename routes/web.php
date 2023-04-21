<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin Route

Route::get('/sign_out', [App\Http\Controllers\HomeController::class, 'sign_out'])->name('sign_out');

//Consolve

Route::get('/consolve', [App\Http\Controllers\ConsolveController::class, 'index'])->name('consolve');
Route::post('/create/consolve', [App\Http\Controllers\ConsolveController::class, 'create'])->name('create.consolve');
Route::get('/edit-consolve/{id}', [App\Http\Controllers\ConsolveController::class, 'edit'])->name('edit_consolve');
Route::post('/update-consolve/{id}', [App\Http\Controllers\ConsolveController::class, 'update'])->name('update_consolve');
Route::get('/delete-consolve/{id}', [App\Http\Controllers\ConsolveController::class, 'delete'])->name('delete_consolve');

//AppAd

Route::get('/app_add', [App\Http\Controllers\AppAdController::class, 'index'])->name('app_add');
Route::post('/create/app_add', [App\Http\Controllers\AppAdController::class, 'create'])->name('create.app_add');
Route::get('/edit-app_add/{id}', [App\Http\Controllers\AppAdController::class, 'edit'])->name('edit_app_add');
Route::post('/update-app_add/{id}', [App\Http\Controllers\AppAdController::class, 'update'])->name('update_app_add');
Route::get('/delete-app_add/{id}', [App\Http\Controllers\AppAdController::class, 'delete'])->name('delete_app_add');





//pages
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('user_profile');
Route::post('/add_profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('edit_profile');
Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'updatePassword'])->name('update-password');


//Contact
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'contact'])->name('contact');
