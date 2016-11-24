<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Excel;

use App\JurnalModel;

class ExcelController extends Controller
{

  public function bulanSekarang(){
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

    $this->dataExport = $data['data']['jurnal_bulan'];

    Excel::create(date('y-m-d h:i:s'), function($excel){
      // Set the title
      $excel->setTitle('Jurnal Bulan Mei');

      // Chain the setters
      $excel->setCreator('Pemilik');

      // Call them separately
      $excel->setDescription('A demonstration to change the file properties');

      $excel->sheet('Jurnal', function($sheet) {
          $sheet->fromArray($this->dataExport);
      });
    })->download('xlsx');
  }

  public function bulan(){
    Excel::create(date('y-m-d h:i:s'), function($excel){
      // Set the title
      $excel->setTitle('Jurnal Bulan Mei');

      // Chain the setters
      $excel->setCreator('Pemilik');

      // Call them separately
      $excel->setDescription('A demonstration to change the file properties');

      $excel->sheet('Jurnal', function($sheet) {
          $sheet->fromArray(array(
              ['no' => 1, 'nama' => 'aceng','jenis' => 'l'],
              ['no' => 1, 'nama' => 'aceng','jenis' => 'l'],
          ));
      });

    })->download('xlsx');


  }
}
