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
Route::get('/user_data.usertable', 'UsertableController@show');
Route::get('/destroy/{id}','UsertableController@destroy');
Route::get('/edit/{id}','UsertableController@edit');
Route::post('/edit/{id}','UsertableController@update');

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefixmiddleware' => ['admin']], function(){
Route::get('/adminpanel', function () {
    return view('admin.adminpanel');
});
Route::get('/leaderpanel', function (){
    return view('leader.leaderpanel');
});
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('report','ReportController');
Route::resource('leader','LeaderController');
// Route::resource('employee','EmployeeController');
// Route::get('leader_home',function(){
//     return view('/emp.employee_index');
// });


