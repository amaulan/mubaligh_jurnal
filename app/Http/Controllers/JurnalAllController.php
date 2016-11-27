<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\JurnalModel;
use App\SiswaModel;
use App\KelasModel;

use Redirect;

class JurnalAllController extends Controller
{
  public function tahun(){
    $data['page']['active']     = 'jurnal';
    $data['page']['title']      = 'Jurnal Tahunan';


    $get_max_tanggal            = JurnalModel::select('tanggal')->get()->max();
    $get_min_tanggal            = JurnalModel::select('tanggal')->get()->min();

    for ($i=(int)date('Y',$get_min_tanggal->tanggal); $i <= date('Y',$get_max_tanggal->tanggal) ; $i++) {
      $awal_tahun               = strtotime($i.'-01-01 00:00:01');
      $akhir_tahun              = strtotime($i.'-12-30 23:59:59');

      $collect                  = [
        'tahun'                 => $i,
        'jumlah'                => JurnalModel::whereBetween('tanggal',[$awal_tahun,$akhir_tahun])->count()
      ];

      $data['data']['tahun'][]  = $collect;

    }

    // return $data;
    return view('page.jurnal-tahun', compact('data'));
  }

  public function bulan($tahun){
    $data['page']['active']     = 'jurnal';
    $data['page']['title']      = 'Jurnal';

    $data['tahun']              = $tahun;

    $awal_tahun                 = strtotime($tahun.'-01-01 00:00:01');
    $akhir_tahun                = strtotime($tahun.'-12-30 23:59:59');

    $get_jurnal                 = JurnalModel::whereBetween('tanggal',[$awal_tahun,$akhir_tahun])->orderBy('tanggal','ASC')->get();

    foreach ($get_jurnal as $key => $value) {

        switch(date('m',$value->tanggal)){

          case '01':
            $data['bulan']['1'][]        = $value;
            break;

          case '02':
            $data['bulan']['2'][]        = $value;
            break;

          case '03':
            $data['bulan']['3'][]        = $value;
            break;

          case '04':
            $data['bulan']['4'][]        = $value;
            break;

          case '05':
            $data['bulan']['5'][]        = $value;
            break;

          case '06':
            $data['bulan']['6'][]        = $value;
            break;

          case '07':
            $data['bulan']['7'][]        = $value;
            break;

          case '08':
            $data['bulan']['8'][]        = $value;
            break;

          case '09':
            $data['bulan']['9'][]        = $value;
            break;

          case '10':
            $data['bulan']['10'][]       = $value;
            break;

          case '11':
            $data['bulan']['11'][]       = $value;
            break;

          case '12':
            $data['bulan']['12'][]       = $value;
            break;

        }
    }


    return view('page.jurnal-tahun-bulan', compact('data'));

  }

  public function hari($tahun, $bulan){
    $data['page']['active']                    = 'jurnal';
    $data['page']['title']                     = 'Jurnal';

    $data['bulan']                             = \App\Http\Controllers\JurnalController::bulan2str($bulan).' '.$tahun;
    $data['bulan_self']                        = $bulan;
    $data['tahun_self']                        = $tahun;   

    $now                                       = time();
    // $awal_bulan                                = strtotime(date('Y-m-d h:i:s')." -".(date('d')-1).' days');

    $awal_bulan_req                            = strtotime($tahun.'-'.$bulan.'-01 00:00:00');
    $akhir_bulan_req                           = strtotime(date('Y-m-d H:i:s',$awal_bulan_req).' +1 month -2 second ');



    // Kelompokan Pertanggal
    $tgl_akhir                                 = date('d', $akhir_bulan_req);
    // echo date('Y-m-d H:i:s', $akhir_bulan_req); die();
    // echo  $tgl_akhir; die();

    $awal_hari                                 = $awal_bulan_req;
    $akhir_hari                                = strtotime(date('Y-m-d H:i:s', $awal_hari).' +24 hours');

    // die();

    for ($i=1; $i <= $tgl_akhir ; $i++) {
      $data['data']['jurnal_bulan'][$i]        = JurnalModel::whereBetween('tanggal',[$awal_hari,$akhir_hari])->get();

      $awal_hari                               = strtotime(date('Y-m-d H:i:s ',$awal_hari).'+24 hours');
      $akhir_hari                              = strtotime(date('Y-m-d H:i:s ',$awal_hari).'+24 hours');

    }

    return view('page.jurnal-bulan', compact('data'));
    // return $data;
  }

}
