<?php

use App\Http\Controllers\UserConroller;
use App\Models\User;
use GuzzleHttp\Middleware;
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


Route::middleware(['auth'])->group(function(){
Route::get('/', function () {
    $user = User::all();
    return view('welcome')->with([
        'users'=>$user
    ]);
});
Route::post('/logout',[UserConroller::class,'logout'])->name('logout');         

Route::get('user/{following_id}/follow',[UserConroller::class,'follow'])->name('follow');
Route::get('user/{following_id}/unfollow',[UserConroller::class,'unfollow'])->name('unfollow');


});

Route::post('/register',[UserConroller::class,'store'])->name('newregister');
Route::post('/login',[UserConroller::class,'auth'])->name('login');

Route::get('/register',[UserConroller::class,'registerform'])->name('register');
Route::get('/login',[UserConroller::class,'loginform'])->name('login');





