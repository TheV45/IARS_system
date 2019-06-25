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
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
*/
// Auth::routes();
Auth::routes(['verify'=>true]);
Route::get('/','PagesController@index');

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
Route::get('/login/teacher', 'Auth\LoginController@showTeacherLoginForm');
Route::get('/register/teacher', 'Auth\RegisterController@showTeacherRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/login/teacher', 'Auth\LoginController@teacherLogin');
Route::post('/register/teacher', 'Auth\RegisterController@createTeacher');
Route::post('/save', 'HomeController@store')->middleware('auth');
// Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin')->middleware('auth:admin');
// Route::view('/teacher', 'teacher')->middleware('auth:teacher');
Route::post('/teacher/password/email', 'Auth\TeacherForgotPasswordController@sendResetLinkEmail');
Route::get('/teacher/password/reset', 'Auth\TeacherForgotPasswordController@showLinkRequestForm');
Route::post('/teacher/password/reset', 'Auth\TeacherResetPasswordController@reset');
Route::get('/teacher/password/reset/{token}', 'Auth\TeacherResetPasswordController@showResetForm');
//Route::get('/home', 'HomeController@index')->name('home');
//Route::get('/teacher', 'TeachersController@index')->middleware('auth:teacher');

Route::group(['prefix' => 'teacher', 'middleware' => 'auth:teacher'], 
function () 
{
    Route::get('checkstatus', 'TeachersController@checkstatus');
    Route::post('status','TeachersController@status');
    Route::get('updateprofile','ProfileController@indexTeacher');
    Route::get('send', 'MailsController@send');
    Route::view('','Teacher.dashboard');
    Route::get('putmarks', 'TeachersController@index');
    Route::get('password/teacher', 'TeachersController@resetPassword');
    Route::get('checkstatus', 'TeachersController@checkstatus');
    Route::post('status','TeachersController@status');
    Route::get('profile', 'ProfileController@index');
    Route::patch('updateprofile/{id}', 'ProfileController@update');
    Route::post('/studentmarks','TeachersController@create');
    Route::post('/submitmarks','TeachersController@store');
    Route::post('/marks','TeachersController@marks');
}
);
Route::group(['prefix' => 'home', 'middleware' => ['auth','verified']], function () 
{
    Route::view('','auth.home');
    //Route::get('','HomeController@index');
    Route::get('marks','HomeController@index');
    Route::get('profile', 'ProfileController@indexStudent');
    Route::patch('profile/{id}', 'ProfileController@updateStudent');
}
);