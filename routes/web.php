<?php

use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Role\RoleContorller;
use App\Http\Controllers\User\UserController;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Contracts\Role;

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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/',function(){
   return redirect('/dashboard');
});

Route::middleware([Authenticate::class])->group(function(){

    Route::get('/dashboard',function(){
        return view('pages.dashboard.index');
    });


    Route::controller(MenuController::class)->group(function(){
        Route::get('/managemenulist','index')->name('managemenulist.index');
        Route::get('/managemenulist/create','create')->name('managemenulist.create');
        Route::post('/managemenulist','store')->name('managemenulist.store');
        Route::get('/managemenulist/{id}/edit','edit')->name('managemenulist.edit');
        Route::put('/managemenulist/{id}','update')->name('managemenulist.update');
        Route::get('/managemenulist/{id}','show')->name('managemenulist.show');
    });

    Route::controller(RoleContorller::class)->group(function(){
        Route::get('/managerole','index')->name('managerole.index');
        Route::get('/managerole/create','create')->name('managerole.create');
        Route::post('/managerole','store')->name('managerole.store');
        Route::get('/managerole/{id}/edit','edit')->name('managerole.edit');
        Route::put('/managerole/{id}','update')->name('managerole.update');
        Route::get('/managerole/{id}','show')->name('managerole.show');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('/manageuser','index')->name('manageuser.index');
        Route::get('/manageuser/create','create')->name('manageuser.create');
        Route::post('/manageuser','store')->name('manageuser.store');
        Route::get('/manageuser/{id}/edit','edit')->name('manageuser.edit');
        Route::put('/manageuser/{id}','update')->name('manageuser.update');
        Route::get('/manageuser/{id}','show')->name('manageuser.show');
    });
    
    Route::get('/test',function(){
        return view('test');
    });
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});



