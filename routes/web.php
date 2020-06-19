<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', 'PageController@index')->name('pages.home');
Route::get('/archive', 'PageController@archive')->name('pages.archive');
Route::resource('class', 'CourseController', ['parameters' => ["class" => "course"]]);
Route::get('class/{course}/toggle-archive', 'CourseController@toggleArchive')->name('class.toggleArchive');
Route::get('class/{course}/people', "CourseController@people")->name("class.people");
Route::resource('class.lecture', 'LectureController', ['parameters' => ["class" => "course"]]);
Route::post('class/{course}/lecture/generateQR', "LectureController@generateQR")->name("class.lecture.generateQR");
Route::resource('class.student', 'StudentController', ['parameters' => ["class" => "course"]]);
Route::get('class/{course}/student/{student}/reset-device-link', "StudentController@resetDeviceLink")->name("class.student.resetDeviceLink");
Route::resource('class.teacher', 'TeacherController', ['parameters' => ["class" => "course"]]);
