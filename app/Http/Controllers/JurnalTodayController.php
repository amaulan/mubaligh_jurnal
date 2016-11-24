<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class JurnalTodayController extends Controller
{
  public function index(){
    $data['page']['active'] = 'jurnal';

    return view('page.jurnal-today', compact('data'));
  }
}
