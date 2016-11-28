<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Excel;

use App\JurnalModel;
use App\KelasModel;
use App\SiswaModel;

class ExcelController extends Controller
{
  public function __construct(){
//
  }

  public function bulanSekarang(){
    $now                    = time();
    $awal_bulan             = strtotime(date('Y-m-d h:i:s')." -".(date('d')-1).' days');


    // Kelompokan Pertanggal
    $tgl_sekarang           = date('d', $now);

    $awal_hari              = strtotime(date('Y-m-d ',$awal_bulan).' 00:00:01');
    $akhir_hari             = strtotime(date('Y-m-d H:i:s', $awal_hari).' +24 hours');

    for ($i=1; $i <= $tgl_sekarang ; $i++) {
      $data['data']['jurnal_bulan'][$i] = JurnalModel::whereBetween('tanggal',[$awal_hari,$akhir_hari])->orderBy('tanggal','ASC')->get();

      $awal_hari            = strtotime(date('Y-m-d H:i:s ',$awal_hari).'+24 hours');
      $akhir_hari           = strtotime(date('Y-m-d H:i:s', $awal_hari).' +24 hours');
    }

    // return $data['data']['jurnal_bulan'];
    // collect data

    $prepare[] = [
      'TANGGAL'        => '',
      'JAM'            => '',
      'JURNAL'         => '',
      'DESKRIPSI'      => '',
      'KELAS'          => '',
      'JUMLAH_SISWA'   => ''
    ];

    foreach ($data['data']['jurnal_bulan'] as $key => $value) {

      if (count($value) != 0) {
        // $prepare[$key];

        foreach ($value as $key2 => $value2) {
          $bulan            = \App\Http\Controllers\JurnalController::bulan2str(date('m', $value2->tanggal));

          $prepare[]        = [
            'TANGGAL'        => \App\Http\Controllers\JurnalController::day2hari(date('D', $value2->tanggal)).date(', d ', $value2->tanggal).$bulan.date(' Y',$value2->tanggal),
            'JAM'            => date('H:i', $value2->tanggal),
            'JURNAL'         => $value2->judul,
            'DESKRIPSI'      => $value2->deskripsi,
            'KELAS'          => KelasModel::find($value2->kelas_id)->kelas_nama,
            'JUMLAH_SISWA'   => count(json_decode($value2->kehadiran,TRUE))
          ];

        }
      }
    }

    // dd($prepare);
    // die();

    $this->dataExport = $prepare;

    // return $this->dataExport;
    Excel::create('Rekap Jurnal Bulan '.(date('M Y')), function($excel){
      // Set the title
      $excel->setDescription('A demonstration to change the file properties');

      $excel->sheet('Jurnal', function($sheet) {
          $sheet->fromArray($this->dataExport);
      });
    })->download('xlsx');
  }

  public function bulan($tahun , $bulan){

    $now                    = time();
    $awal_bulan             = strtotime($tahun.'-'.$bulan.'-1 00:00:00');
    $akhir_bulan            = strtotime(date('Y-m-d H:i:s',$awal_bulan).' +1 month -2 second');

    $data['data']['jurnal_bulan'] = JurnalModel::whereBetween('tanggal',[$awal_bulan,$akhir_bulan])->orderBy('tanggal','ASC')->get();

    $prepare[] = [
      'TANGGAL'        => '',
      'JAM'            => '',
      'JURNAL'         => '',
      'DESKRIPSI'      => '',
      'KELAS'          => '',
      'JUMLAH_SISWA'   => ''
    ];


        foreach ($data['data']['jurnal_bulan'] as $key2 => $value2) {
          $bulan            = \App\Http\Controllers\JurnalController::bulan2str(date('m', $value2->tanggal));

          $prepare[]        = [
            'TANGGAL'        => \App\Http\Controllers\JurnalController::day2hari(date('D', $value2->tanggal)).date(', d ', $value2->tanggal).$bulan.date(' Y',$value2->tanggal),
            'JAM'            => date('H:i', $value2->tanggal),
            'JURNAL'         => $value2->judul,
            'DESKRIPSI'      => $value2->deskripsi,
            'KELAS'          => KelasModel::find($value2->kelas_id)->kelas_nama,
            'JUMLAH_SISWA'   => count(json_decode($value2->kehadiran,TRUE))
          ];

        }

    $this->dataExport = $prepare;

    // return $this->dataExport;
    Excel::create('Rekap Jurnal Bulan '.\App\Http\Controllers\JurnalController::bulan2str(date('m',$data['data']['jurnal_bulan'][0]->tanggal)).' '.$tahun, function($excel){
      // Set the title
      $excel->setDescription('A demonstration to change the file properties');

      $excel->sheet('Jurnal', function($sheet) {
          $sheet->fromArray($this->dataExport);
      });
    })->download('xlsx');

  }

  public function tahun($tahun){
    $now                    = time();
    $awal_tahun             = strtotime($tahun.'-01-01 00:00:00');
    $akhir_tahun            = strtotime(date('Y-m-d H:i:s',$awal_tahun).' +1 year -1 second');

    // echo date('Y-m-d H:i:s', $akhir_tahun);
    // die();

    $data['data']['jurnal_bulan'] = JurnalModel::whereBetween('tanggal',[$awal_tahun,$akhir_tahun])->orderBy('tanggal','ASC')->get();

    $prepare[] = [
      'TANGGAL'        => '',
      'JAM'            => '',
      'JURNAL'         => '',
      'DESKRIPSI'      => '',
      'KELAS'          => '',
      'JUMLAH_SISWA'   => ''
    ];


        foreach ($data['data']['jurnal_bulan'] as $key2 => $value2) {
          $bulan            = \App\Http\Controllers\JurnalController::bulan2str(date('m', $value2->tanggal));

          $prepare[]        = [
            'TANGGAL'        => \App\Http\Controllers\JurnalController::day2hari(date('D', $value2->tanggal)).date(', d ', $value2->tanggal).$bulan.date(' Y',$value2->tanggal),
            'JAM'            => date('H:i', $value2->tanggal),
            'JURNAL'         => $value2->judul,
            'DESKRIPSI'      => $value2->deskripsi,
            'KELAS'          => KelasModel::find($value2->kelas_id)->kelas_nama,
            'JUMLAH_SISWA'   => count(json_decode($value2->kehadiran,TRUE))
          ];

        }

    $this->dataExport = $prepare;

    // return $this->dataExport;
    Excel::create('Rekap Jurnal Tahun '.$tahun, function($excel){
      // Set the title
      $excel->setDescription('A demonstration to change the file properties');

      $excel->sheet('Jurnal', function($sheet) {
          $sheet->fromArray($this->dataExport);
      });
    })->download('xlsx');

  }

  public function today(){
    $today = strtotime(date('d-M-Y ').'00:00:00 -24 hours');
    $now = time();


    $awal_hari  = strtotime(date('Y-m-d ',$now).' 00:00:01');
    $akhir_hari = strtotime(date('Y-m-d H:i:s', $awal_hari).' +24 hours');


    $data['data']['jurnal'] = JurnalModel::whereBetween('tanggal',[$awal_hari, $akhir_hari])->orderBy('tanggal','DESC')->get();

    $prepare[] = [
      'TANGGAL'        => '',
      'JAM'            => '',
      'JURNAL'         => '',
      'DESKRIPSI'      => '',
      'KELAS'          => '',
      'JUMLAH_SISWA'   => ''
    ];

    foreach ($data['data']['jurnal'] as $key => $value2) {
      $bulan            = \App\Http\Controllers\JurnalController::bulan2str(date('m', $value2->tanggal));

      $prepare[]        = [
        'TANGGAL'        => \App\Http\Controllers\JurnalController::day2hari(date('D', $value2->tanggal)).date(', d ', $value2->tanggal).$bulan.date(' Y',$value2->tanggal),
        'JAM'            => date('H:i', $value2->tanggal),
        'JURNAL'         => $value2->judul,
        'DESKRIPSI'      => $value2->deskripsi,
        'KELAS'          => KelasModel::find($value2->kelas_id)->kelas_nama,
        'JUMLAH_SISWA'   => count(json_decode($value2->kehadiran,TRUE))
      ];
    }

    $this->dataExport = $prepare;

    // return $this->dataExport;
    Excel::create('Rekap Jurnal '.date('Y-m-d'), function($excel){
      // Set the title
      $excel->setDescription('A demonstration to change the file properties');

      $excel->sheet('Jurnal', function($sheet) {
          $sheet->fromArray($this->dataExport);
      });
    })->download('xlsx');

  }
}
