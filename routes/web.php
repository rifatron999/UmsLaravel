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

//Route::get('/', 'PageController@home');
//Route::get('/page/login', 'PageController@login');
//Route::get('/page/admin', 'PageController@admin');

//Route::get('/page/user', 'PageController@user');

//Route::get('/login', ["uses"=>"LoginController@index"]);

//login
Route::get('/login', 'loginController@index')->name('login.index');
Route::post('/login', 'loginController@valid');
//login ends

//register
Route::get('/registration','registrationController@index')->name('registration.index');
Route::post('/registration', 'registrationController@valid');
//register ends

//home
Route::get('/home', 'homeController@index')->name('home.index');
//home ends

//portal
Route::group(['middleware'=>['session_check']], function(){

Route::get('/portal','portalController@index')->name('portal.index');
Route::get('/portal/faculty','facultyController@index')->name('faculty.index');
Route::get('/portal/admin','adminController@index')->name('admin.index');
Route::get('/portal/register','registerController@index')->name('register.index');
Route::get('/portal/student','studentController@index')->name('student.index');

});
//portal ends


Route::get('/home/details/{sid}', 'HomeController@details')->name('home.details');
Route::get('/home/stdList', 'HomeController@show')->name('home.stdlist');
Route::get('/home/add', 'HomeController@add')->name('home.add');
//Route::get('/home/add', ["as"=>"home.add","uses"=>"HomeController@add"]);
Route::post('/home/add', 'HomeController@create');
Route::get('/home/edit/{sid}', 'HomeController@edit')->name('home.edit');
Route::post('/home/edit/{sid}', 'HomeController@update');
Route::get('/home/delete/{sid}', 'HomeController@delete')->name('home.delete');
Route::post('/home/delete/{sid}', 'HomeController@destroy');
Route::get('/logout', 'logoutController@index');

//Route::resource('accounts', 'AccountController');


