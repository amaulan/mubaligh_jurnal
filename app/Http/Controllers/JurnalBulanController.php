<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\JurnalModel;

class JurnalBulanController extends Controller
{
  public function index(){

    $data['page']['active'] = 'jurnal';
    $data['page']['title']  = 'Jurnal';

    $now = time();
    $awal_bulan = strtotime(date('Y-m-d h:i:s')." -".(date('d')-1).' days');


    // Kelompokan Pertanggal
    $tgl_sekarang = date('d', $now);

    $awal_hari  = strtotime(date('Y-m-d ',$awal_bulan).' 00:00:01');
    $akhir_hari = strtotime(date('Y-m-d H:i:s', $awal_hari).' +24 hours');

    for ($i=1; $i <= $tgl_sekarang ; $i++) {


      $data['data']['jurnal_bulan'][$i] = JurnalModel::whereBetween('tanggal',[$awal_hari,$akhir_hari])->get();

      $awal_hari = strtotime(date('Y-m-d H:i:s ',$awal_hari).'+24 hours');
      $akhir_hari = strtotime(date('Y-m-d H:i:s', $awal_hari).' +24 hours');

    }

    return view('page.jurnal-bulan', compact('data'));
  }
}
