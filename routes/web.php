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
Route::get('/signal', function () {
    return view('Signal-Filter');
});
Route::get('/sure', function () {
    return view('Sure-Profit-FX');
});
Route::post('/studentadd','StudentController@store');
Route::get('ajax','dataController@data');
Route::get('/ajax-subcat',function()
{
$id = Input::get('id');
$subcategories = data::where('id','=', $id)->get();
return Response::json($subcategories);
});
Route::get('/dynamic_dependent', 'dataController@index');
Route::post('dynamic_dependent/fetch', 'dataController@fetch')->name('dynamicdependent.fetch');
Route::get('dynamic_dependent/fet', 'dataController@fet')->name('dynamicdependent.fet');
Route::get('/sms', function () {
    return view('sms');
});

Route::post('sms','dataController@sms');
Route::post('sent','dataController@sent');