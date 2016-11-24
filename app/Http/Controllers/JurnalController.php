<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\JurnalModel;
use App\SiswaModel;
use App\KelasModel;

use Validator;

class JurnalController extends Controller
{

  public function destroy($jurnal_id)
  {
    $jurnal = JurnalModel::find($jurnal_id);

    if (!count($jurnal)) {
        return \Redirect::to('jurnal/today')->with('err_msg','Jurnal Tidak Ada');
    }

    $jurnal->delete();
    return \Redirect::to('jurnal/today')->with('sc_msg','Berhasil Menghapus Jurnal');
  }

  public function edit($jurnal_id)
  {
    $data['page']['active'] = 'jurnal';
    $data['page']['title']  = 'Jurnal';

    $data['info']['edit']   = TRUE;

    $today = strtotime(date('d-M-Y ').'00:00:00 -24 hours');
    $now = time();

    // echo $data['today'].'<br>';
    // echo date('y-m-d H:i:s',strtotime(date('d-M-Y ').'00:00:00')).'<br>';
    // echo date('y-m-d H:i:s',strtotime($data['today']));


    $data['data']['jurnal_edit'] = JurnalModel::find($jurnal_id);
    $data['data']['jurnal'] = JurnalModel::whereBetween('tanggal',[$today, $now])->orderBy('tanggal','DESC')->get();
    $data['data']['siswa'] = SiswaModel::all();
    $data['data']['kelas'] = KelasModel::all();

    // return $data;
    return view('page.jurnal-today', compact('data'));
  }

  public function update(Request $request)
  {
    $data = $request->all();

    $validasi = Validator::make($data, [
      'judul'       => 'required|min:5',
      'deskripsi'   => 'required|min:10',
      'siswa_id'    => 'required'
    ]);

    if ($validasi->fails()) {
        return \Redirect::to('jurnal/today')->with('err_msg',$validasi->errors()->all());
    }

    // $data['tanggal']  = time();
    $data['kehadiran'] = json_encode($data['siswa_id']);
    unset($data['siswa_id']);


    JurnalModel::find($data['jurnal_id'])->update($data);

    return \Redirect::to('jurnal/today')->with('sc_msg','Berhasil Mengedit Jurnal');
  }

}
