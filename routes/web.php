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

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/email', function () {  
    
    return new WelcomeMail();
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home.index');


// Normusercontroller starts here
Route::get('dashboard', 'NormUserController@index');
Route::get('contact', 'NormUserController@contact');
Route::post('contact', 'NormUserController@store');


// UploadController For Admin Only
Route::get('/upload', 'UploadController@index');
Route::post('/upload', 'UploadController@store')->name('upload.store');

Route::get('/upload/{id}/update', 'UploadController@uploadEdit')->name('upload.uploadEdit');
Route::patch('/upload/{id}', 'UploadController@update')->name('upload.update');

Route::delete('/upload/{id}', 'UploadController@destroy')->name('upload.destroy');

Route::get('/invoice', 'AdminController@invoice');;

// Start MeetingController here
// MeetingController For store data


// MeetingContorller For Form post data
Route::get('formulation', 'MeetController@index')->name('index');
Route::get('form', 'MeetController@form')->name('form.form');
Route::post('formstore', 'MeetController@store')->name('formstore.store');

// MeetingController For EditForm data
Route::get('/formulation/{id}/edit', 'MeetController@edit')->name('formulation.edit');
Route::patch('/formulation/{id}', 'MeetController@update')->name('formulation.update');

// MeetingController For Delete data
Route::delete('/blogs/{id}', 'MeetController@destroy')->name('blogs.destroy');

// End MeetingController here

// DepartmentController Start Here
Route::get('/human-resource-and-administration', 'DepartmentController@department_1');
Route::get('/download/{id}', 'DepartmentController@download_1')->name('download.download_1');

Route::get('/urban-planning-and-environment', 'DepartmentController@department_2');
Route::get('/download/{id}', 'DepartmentController@download_2')->name('download.download_2');

Route::get('/finance-and-trade', 'DepartmentController@department_3');
Route::get('/download/{id}', 'DepartmentController@download_3')->name('download.download_3');

Route::get('/environment-and-sanitation', 'DepartmentController@department_4');
Route::get('/download/{id}', 'DepartmentController@download_4')->name('download.download_4');

Route::get('/education', 'DepartmentController@department_5');
Route::get('/download/{id}', 'DepartmentController@download_5')->name('download.download_5');

Route::get('/community-and-welfare', 'DepartmentController@department_6');
Route::get('/download/{id}', 'DepartmentController@download_6')->name('download.download_6');

Route::get('/agricultre-and-cooperative', 'DepartmentController@department_7');
Route::get('/download/{id}', 'DepartmentController@download_7')->name('download.download_7');

Route::get('/livestock-and-fisheries', 'DepartmentController@department_8');
Route::get('/download/{id}', 'DepartmentController@download_8')->name('download.download_8');

Route::get('/works', 'DepartmentController@department_9');
Route::get('/download/{id}', 'DepartmentController@download_9')->name('download.download_9');

Route::get('/health', 'DepartmentController@department_10');
Route::get('/download/{id}', 'DepartmentController@download_10')->name('download.download_10');

Route::get('/water', 'DepartmentController@department_11');
Route::get('/download/{id}', 'DepartmentController@download_11')->name('download.download_11');

Route::get('/planning-statistics-and-monitoring', 'DepartmentController@department_12');
Route::get('/download/{id}', 'DepartmentController@download_12')->name('download.download_12');
// DepartmentController End Here