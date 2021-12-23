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

Route::get('/', function () {
    return view('components/trang_chu');
})->name('home');
Route::prefix('web')->group(function(){
    Route::get('bai_thi', function () { return view('web/bai_thi');})->name('bai_thi');
    Route::get('khoa_hoc', function () {return view('web/khoa_hoc');})->name('khoa_hoc');
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