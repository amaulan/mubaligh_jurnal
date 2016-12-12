<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{
    public function index(){
        $data['page']['active'] = 'about';
        $data['page']['title']  = 'About';

        $data['breadcumb'][0]      = [
            'icon'  => 'icon-help',
            'link'  => url('about'),
            'text'  => 'About'
        ];

        return view('page.about', compact('data'));
    }
}

