<?php

use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/reg',[SignController::class,'index'])->name('login.index');  // or  view('/reg',('layouts.reg'));
Route::get('/log',[SignController::class,'create'])->name('login.login');
Route::post('/reg',[SignController::class,'store'])->name('login.register');
Route::post('/verify',[SignController::class,'verify'])->name('login.verify');
Route::get('/wel/{data}',[SignController::class,'view'])->name('login.wel');
Route::get('/logout', [SignController::class, 'logout'])->name('logout');



// Route::get('/image',[SignController::class,'upload'])->name('image');
// Route::post('/image1',[SignController::class,'imageupload'])->name('image.upload');