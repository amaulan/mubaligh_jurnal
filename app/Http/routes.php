<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('layout.main');
});

Route::group(['prefix' => 'siswa'],function(){
  Route::get('/', function(){
    $data['page']['active'] = 'siswa';

    return view('page.siswa', compact('data'));
  });
});

Route::group(['prefix' => 'jurnal'], function(){
  Route::get('/today', function(){
    $data['page']['active'] = 'jurnal';

    return view('page.jurnal-today', compact('data'));
  });

  Route::get('/bulan', function(){
    $data['page']['active'] = 'jurnal';

    return view('page.jurnal-bulan', compact('data'));
  });
});
