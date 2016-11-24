<?php


Route::get('/', function () {
    return view('layout.main');
});

Route::group(['prefix' => 'siswa'],function(){
  Route::get('/',                  'SiswaController@index');
  Route::post('/add',              'SiswaController@create');
  Route::get('/delete/{siswa_id}', 'SiswaController@destroy');
  Route::post('/update',           'SiswaController@update');
});

Route::group(['prefix' => 'jurnal'], function(){
  Route::get('/today', 'JurnalTodayController@index');
  Route::get('/bulan', 'JurnalBulanController@index');

});
