<?php

use App\Http\Controllers\CustomerController;
use App\Models\Consultant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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
Route::middleware('throttle:100,60')->group(function () {

    Route::get('/', function () {
        $consultants = Consultant::get();
        return view('pages.index', compact('consultants'));
    });

    Route::get('logout', function () {
        Auth::logout();
        return Redirect::route('login');
    })->name('logout');


    Route::get('/login', function () {
        return view('pages.login');
    })->name('login');

    Route::get('/register', function () {
        return view('pages.register');
    })->name('register');


    Route::post('user_login', [CustomerController::class, 'customerLogin'])->name('cust_login');
    Route::post('user_register', [CustomerController::class, 'customerRegister'])->name('cust_register');

});