<?php

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

Auth::routes();

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('login', ['as' => 'login.post', 'uses' => 'Auth\LoginController@login']);
Route::post('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('password/create/{token}', 'UsersController@createdPassword')->name('password.create');
Route::post('password/create', 'UsersController@setPassword');
Route::get('password/create/{token}', 'UsersController@createdPassword')->name('password.create');
Route::post('password/create', 'UsersController@setPassword');

Route::get('password/email', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.email');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.request');
//Route::resource('create_passwords', 'CreatePasswordsController', ['only'=> ['index','create','store','update']]);
Route::resource('create_passwords', 'CreatePasswordsController');
 
Route::post('password/reset', 'Auth\ResetPasswordController@postReset')->name('password.reset');
Route::get('notifications/markall', 'NotificationsController@markAll')->name('notifications.markall');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'PagesController@dashboard');
    Route::get('dashboard', 'PagesController@dashboard')->name('dashboard');
    Route::get('showdashboard', 'PagesController@showDashboard')->name('showdashboard');
    Route::get('notifications/getall', 'NotificationsController@getAll')->name('notifications.get');
    Route::post('notifications/markread', 'NotificationsController@markRead')->name('notifications.markread');

    Route::get('users/data', 'UsersController@anyData')->name('users.data');
    Route::get('users/statusupdate/{id}', 'UsersController@statusUpdate');
    Route::get('users/roleupdate/{id}', 'UsersController@roleUpdate');
    Route::post('users/store', 'UsersController@store');
    Route::resource('users', 'UsersController');
    
    Route::get('registers/data', 'RegisterController@anyData')->name('users.data');
    Route::get('registers/statusupdate/{id}', 'RegisterController@statusUpdate');
    Route::get('registers/roleupdate/{id}', 'RegisterController@roleUpdate');
    Route::post('registers/store', 'RegisterController@store');
    Route::resource('registers', 'RegisterController');
    
    
     Route::post('users/changeprofileimage', 'UsersController@changeProfileImage')->middleware('user.changeprofileimage')->name('changeprofileimage');
    /************************masters created by satya 22-11-2017 depot***************************** */
   
    Route::get('blessings/view_detail/{id}', 'NotificationController@viewDetail');
    Route::get('blessings/statusupdate/{id}', 'NotificationController@statusUpdate');
    Route::post('blessings/store', 'NotificationController@store');
    Route::get('blessings/order_list', 'NotificationController@orderList');
    Route::resource('blessings', 'NotificationController');
    
    /************************masters created by satya 22-11-2017 depot***************************** */
    Route::get('orders/view_detail/{id}', 'OrderController@viewDetail');
    Route::get('orders/statusupdate/{id}', 'OrderController@statusUpdate');
    Route::post('orders/store', 'OrderController@store');
    Route::get('orders/order_list', 'OrderController@orderList');
    Route::resource('orders', 'OrderController');
     /*****************************************************@author *************/
    Route::get('donations/view_detail/{id}', 'DonationController@viewDetail');
    Route::get('donations/statusupdate/{id}', 'DonationController@statusUpdate');
    Route::post('donations/store', 'DonationController@store');
    Route::get('donations/order_list', 'DonationController@orderList');
    Route::resource('donations', 'DonationController');
    
   
    Route::get('roles/data', 'RolesController@anyData')->name('roles.data');
    Route::get('roles/view_detail/{id}', 'RolesController@viewDetail');
    Route::resource('roles', 'RolesController');
     
    Route::resource('permissions', 'PermissionsController');
    Route::post('permissions/savemenuall', 'PermissionsController@saveMenuAll');
    Route::patch('settings/permissionsUpdate', 'SettingsController@permissionsUpdate');
    Route::resource('settings', 'SettingsController');
    Route::post('changepasswords/update', 'ChangepasswordsController@updatePassword');
    Route::get('trip_cancellation_reasons/order_list', 'TripCancellationReasonController@orderList');
    
    
    Route::resource('changepasswords', 'ChangepasswordsController');
    
});
