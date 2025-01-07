<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'BerandaController@landing')->name('index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/register', 'BerandaController@register')->name('admin-register');
Route::post('/admin/register/store', 'BerandaController@registerStore')->name('admin-register-store');

/**
 * Admin routes
 */
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'Backend\DashboardController@index')->name('admin.dashboard');
    Route::resource('roles', 'Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'Backend\UsersController', ['names' => 'admin.users']);
    Route::resource('admins', 'Backend\AdminsController', ['names' => 'admin.admins']);


    Route::group(['prefix' => 'slider'], function () {
        Route::get('/', 'Backend\SliderController@index')->name('slider');
        Route::get('create', 'Backend\SliderController@create')->name('slider.create');
        Route::post('store', 'Backend\SliderController@store')->name('slider.store');
        Route::get('edit/{id}', 'Backend\SliderController@edit')->name('slider.edit');
        Route::post('update/{id}', 'Backend\SliderController@update')->name('slider.update');
        Route::get('destroy/{id}', 'Backend\SliderController@destroy')->name('slider.destroy');
    });


    Route::group(['prefix' => 'gallery'], function () {
        Route::get('/', 'Backend\GalleryController@index')->name('gallery');
        Route::get('create', 'Backend\GalleryController@create')->name('gallery.create');
        Route::post('store', 'Backend\GalleryController@store')->name('gallery.store');
        Route::get('edit/{id}', 'Backend\GalleryController@edit')->name('gallery.edit');
        Route::post('update/{id}', 'Backend\GalleryController@update')->name('gallery.update');
        Route::get('destroy/{id}', 'Backend\GalleryController@destroy')->name('gallery.destroy');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', 'Backend\ProfileController@index')->name('profile');
        Route::post('store', 'Backend\ProfileController@store')->name('profile.store');
    });

    // Login Routes
    Route::get('/login', 'Backend\Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login/submit', 'Backend\Auth\LoginController@login')->name('admin.login.submit');

    // Logout Routes
    Route::post('/logout/submit', 'Backend\Auth\LoginController@logout')->name('admin.logout.submit');

    // Forget Password Routes
    Route::get('/password/reset', 'Backend\Auth\ForgetPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset/submit', 'Backend\Auth\ForgetPasswordController@reset')->name('admin.password.update');
});
