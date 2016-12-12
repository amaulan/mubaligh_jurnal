<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\JurnalModel;

use Redirect;
use Session;

class GaleriController extends Controller
{
  public function index(){
    $data['page']['active'] = 'galeri';
    $data['page']['title']  = 'Galeri';

    $data['breadcumb']      = [
      0           => [
        'icon'    => 'icon-camera-retro',
        'link'    => url('galeri'),
        'text'    => 'Galeri'
      ]
    ];

    $data['data']['galeri'] = JurnalModel::select('pic')->get();

    // return $data;
    return view('page.galeri', compact('data'));
  }
}
