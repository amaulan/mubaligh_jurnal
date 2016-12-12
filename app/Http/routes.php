<?php

Route::get('/', function(){
  return Redirect::to('dashboard');
});


Route::get('/dashboard', function () {

    $data['page']['active'] = 'dashboard';
    $data['page']['title']  = 'Dashboard';

    $data['breadcumb']      = [

    ];

    return view('page.dashboard', compact('data'));
});

Route::group(['prefix' => 'galeri'], function(){
  Route::get('/',                       'GaleriController@index');
});

Route::group(['prefix' => 'about'], function(){
  Route::get('/',                       'AboutController@index');
});

Route::group(['prefix' => 'profil'], function(){
  Route::get('/',                       'ProfilController@index');
  Route::post('/add',                   'ProfilController@create');
  Route::get('/delete/{kelas_id}',      'ProfilController@destroy');
  Route::post('/update',                'ProfilController@update');
});


Route::group(['prefix' => 'kelas'], function(){
  Route::get('/',                       'KelasController@index');
  Route::post('/add',                   'KelasController@create');
  Route::get('/delete/{kelas_id}',      'KelasController@destroy');
  Route::post('/update',                'KelasController@update');
});

Route::group(['prefix' => 'siswa'],function(){
  Route::get('/',                       'SiswaController@index');
  Route::post('/add',                   'SiswaController@create');
  Route::get('/delete/{siswa_id}',      'SiswaController@destroy');
  Route::post('/update',                'SiswaController@update');
});

Route::get('/exportss',      'ExcelController@bulanSekarang');


Route::group(['prefix' => 'jurnal'], function(){
  Route::get('detail/{jurnal_id}',      'JurnalController@detail');
  Route::get('delete/{jurnal_id}',      'JurnalController@destroy');
  Route::get('edit/{jurnal_id}',        'JurnalController@edit');
  Route::post('update',                 'JurnalController@update');

  Route::group(['prefix' => 'export'], function(){
      Route::get('/today',              'ExcelController@today');
      Route::get('/bulan-sekarang',     'ExcelController@bulanSekarang');
      Route::get('/{tahun}',            'ExcelController@tahun');
      Route::get('/{tahun}/{bulan}',    'ExcelController@bulan');
  });

  Route::group(['prefix' => '/today'], function(){
      Route::get('/',                  'JurnalTodayController@index');
      Route::post('/add',              'JurnalTodayController@create');
  });

  Route::group(['prefix' => '/bulan'], function(){
    Route::get('/',                    'JurnalBulanController@index');
  });

  Route::group(['prefix' => '/all'], function(){
    Route::get('/',                   'JurnalAllController@tahun');
  });

  Route::group(['prefix' => 'tahun'], function(){
    Route::get('/{tahun}',            'JurnalAllController@bulan');
    Route::get('/{tahun}/{bulan}',    'JurnalAllController@hari');
  });

});
