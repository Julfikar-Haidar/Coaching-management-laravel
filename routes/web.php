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

Route::get('/', function () {
    return view('welcome');
});



Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){
Route::get('/user-registration',['uses'=>'UserRegistrationController@showRegistrationFrom','as'=>'user-registration']);
Route::post('/user-registration',['uses'=>'UserRegistrationController@user_save','as'=>'user_save']);
Route::get('/user-list',['uses'=>'UserRegistrationController@user_list','as'=>'user-list']);
Route::get('/users-profile/{userId}',['uses'=>'UserRegistrationController@user_profile','as'=>'users-profile']);
Route::get('/change-user-info/{id}',['uses'=>'UserRegistrationController@changeuserInfo','as'=>'change-user-info']);
Route::post('/user-info-update/{id}',['uses'=>'UserRegistrationController@userinfoUpdate','as'=>'user-info-update']);
Route::get('/change-user-avatar/{id}',['uses'=>'UserRegistrationController@changeuserAvatar','as'=>'change-user-avatar']);
Route::post('/update-user-photo',['uses'=>'UserRegistrationController@updatePhoto','as'=>'update-user-photo']);
Route::get('/change-user-password/{id}',['uses'=>'UserRegistrationController@changeuserPassword','as'=>'change-user-password']);
Route::post('/user-password-update',['uses'=>'UserRegistrationController@userpaswordUpdate','as'=>'user-password-update']);
Route::get('/add-header-footer',['uses'=>'HomepageController@addheaderfooterForm','as'=>'add-header-footer']);
Route::post('/add-header-footer',['uses'=>'HomepageController@headerandfooterSave','as'=>'header-and-footer-save']);
Route::get('/manage-header-footer/{id}',['uses'=>'HomepageController@manageHeaderFooter','as'=>'manage-header-footer']);
Route::post('/header-and-footer-update',['uses'=>'HomepageController@headerandfooterUpdate','as'=>'header-and-footer-update']);

// slider start
Route::get('/add-slider',['uses'=>'sliderController@addSlider','as'=>'add-slider']);
Route::post('/add-slider',['uses'=>'sliderController@uploadSlider','as'=>'upload-slide']);
// slider end

});
