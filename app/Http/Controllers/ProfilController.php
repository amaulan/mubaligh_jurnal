<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfilController extends Controller
{
  public function index(){
    $data['page']['active']     = 'profil';
    $data['page']['title']      = 'Profil';

    $data['breadcumb']      = [
      0           => [
        'icon'    => 'icon-user',
        'link'    => url('profil'),
        'text'    => 'Profil'
      ]
    ];

    return view('page.profil', compact('data'));
  }
}
