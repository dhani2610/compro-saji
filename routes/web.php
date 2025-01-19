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

    
    Route::group(['prefix' => 'our-services'], function () {
        Route::get('/', 'Backend\OurServicesController@index')->name('our-services');
        Route::get('create', 'Backend\OurServicesController@create')->name('our-services.create');
        Route::post('store', 'Backend\OurServicesController@store')->name('our-services.store');
        Route::get('edit/{id}', 'Backend\OurServicesController@edit')->name('our-services.edit');
        Route::post('update/{id}', 'Backend\OurServicesController@update')->name('our-services.update');
        Route::get('destroy/{id}', 'Backend\OurServicesController@destroy')->name('our-services.destroy');
    });


    
    Route::group(['prefix' => 'project'], function () {
        Route::get('/', 'Backend\ProjectController@index')->name('project');
        Route::get('create', 'Backend\ProjectController@create')->name('project.create');
        Route::post('store', 'Backend\ProjectController@store')->name('project.store');
        Route::get('edit/{id}', 'Backend\ProjectController@edit')->name('project.edit');
        Route::post('update/{id}', 'Backend\ProjectController@update')->name('project.update');
        Route::get('destroy/{id}', 'Backend\ProjectController@destroy')->name('project.destroy');
    });

    Route::group(['prefix' => 'footer'], function () {
        Route::get('/', 'Backend\FooterController@index')->name('footer');
        Route::post('store', 'Backend\FooterController@store')->name('footer.store');
    });



    Route::group(['prefix' => 'branding'], function () {
        Route::get('/', 'Backend\BrandingController@index')->name('branding');
        Route::get('create', 'Backend\BrandingController@create')->name('branding.create');
        Route::post('store', 'Backend\BrandingController@store')->name('branding.store');
        Route::get('edit/{id}', 'Backend\BrandingController@edit')->name('branding.edit');
        Route::post('update/{id}', 'Backend\BrandingController@update')->name('branding.update');
        Route::get('destroy/{id}', 'Backend\BrandingController@destroy')->name('branding.destroy');
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
