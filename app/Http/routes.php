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
  Route::get('delete/{jurnal_id}','JurnalController@destroy');
  Route::get('edit/{jurnal_id}',  'JurnalController@edit');
  Route::post('update',           'JurnalController@update');

  Route::group(['prefix' => '/today'], function(){
      Route::get('/',              'JurnalTodayController@index');
      Route::post('/add',          'JurnalTodayController@create');
  });

  Route::group(['prefix' => '/bulan'], function(){
    Route::get('/',                'JurnalBulanController@index');

  });

});
