<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    WriterController,};
use Illuminate\Auth\Middleware\Authenticate ;

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
    return view('layout');
});
Route::get('/welcome', function () {
    return view('welcome_user');
});


Route::controller(UserController::class)->group(function()
{
    Route::get('/create','create');
    Route::post('/register','register');
    Route::get('/login','showLoginForm')->name('login');
    Route::post('/login','login');
});

Route::controller(WriterController::class)->prefix('/writer')->group(function()
{   
    Route::get('/login','showLoginForm');
    Route::post('/login','login');
    Route::get('/welcome','welcome')->name('welcome');


});

Route::middleware('guest:writer')->group(function(){
    
    Route::get('/homepage',function(){
    
        return view('welcome_writer');
    })->name('homepage');


});








