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
|components  web
*/

Route::prefix('/')->group(function(){
    Route::get('/' , function () { return view('components/trang_chu');})->name('home');
    Route::get('bai_thi', function () { return view('web/bai_thi');})->name('bai_thi');
    Route::get('khoa_hoc', 'handle@load_khoa_hoc')->name('khoa_hoc');
    Route::get('thi_trac_nghiem/{level}', 'handle@load_bai_thi')->name('thi_trac_nghiem');
    Route::get('register', function () { return view('components/register');})->name('show_register');
    Route::get('login', function () { return view('components/login');})->name('show_login');
    Route::get('history', 'handle@load_history')->name('history');
    Route::get('logout', 'handle@load_logout')->name('logout');

    
    Route::post('ket_qua', 'handle@nop_bai')->name('ket_qua');
    Route::post('register', 'handle@register')->name('register');
    Route::post('login', 'handle@login')->name('login');
});

//  admin.set_data.question
Route::prefix('/admin')->group(function(){
    Route::get('/' , function () { return view('components/admin/index');})->name('admin.home');
    Route::get('set_data', 'handle@set_data_question')->name('admin.set_data');
    Route::get('user', 'handle@set_data_question')->name('admin.set_data.user');
    Route::get('question','handle@get_type_question')->name('admin.set_data.question');
    Route::get('exam', 'handle@set_data_question')->name('admin.set_data.exam');
    Route::get('get_data', 'handle@set_data_question')->name('admin.get_data');

    
    Route::post('insert/question', 'handle@insert_question')->name('insert.question');
});
// Route::get('/cdtn', function () {
//     return view('cdtn');
// });
// Route::get('/test/{id}', function ($id) {
//     return "test ${id}";
// });
// Route::prefix('Backend')->namespace('Backend')->group(function(){
//     Route::get('/user','user@index' )->name("backend.user");
//     Route::get('/course','course@index')->name("backend.course");
//     Route::get('/lesson','lesson@index' )->name("backend.lesson");
// });
// Route::prefix('components')->namespace('components')->group(function(){
//     Route::get('get','');
// });
// Route::get('/bai_thi', function () {
//     return view('web/bai_thi');
// })->name('bai_thi');
// // Route::get()
// Route::get('hoc_lieu', function () {
//     return view('web/hoc_lieu');
// })->name("hoc_lieu");