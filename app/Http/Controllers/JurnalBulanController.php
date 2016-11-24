<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class JurnalBulanController extends Controller
{
  public function index(){
    $data['page']['active'] = 'jurnal';

    return view('page.jurnal-bulan', compact('data'));
  }
}
