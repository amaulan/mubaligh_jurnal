<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SiswaModel;

use Validator;

class SiswaController extends Controller
{
  public function index(){

    $data['data']['siswa']  = SiswaModel::orderBy('siswa_id','desc')->get();

    $data['page']['active'] = 'siswa';

    // return $data;
    return view('page.siswa', compact('data'));
  }

  public function create(Request $request){
    $data = $request->all();

    $validasi = Validator::make($data, [
      'siswa_nama'  => 'required|min:2',
      'siswa_ortu'  => 'required|min:2'
    ]);


    if ($validasi->fails()) {
        return \Redirect::to('siswa')->with('err_msg',$validasi->errors()->all());
    }

    SiswaModel::create($data);
    return \Redirect::to('siswa')->with('sc_msg','Berhasil Menambah Siswa');
  }

  public function destroy($siswa_id)
  {
    $siswa = SiswaModel::find($siswa_id);
    $siswa_nama = $siswa->siswa_nama;

    if (!count($siswa)) {
        return \Redirect::to('siswa')->with('err_msg','Siswa Tidak Ada');
    }

    $siswa->delete();
    return \Redirect::to('siswa')->with('sc_msg','Berhasil Menghapus Siswa '.$siswa_nama);
  }

  public function update(Request $request){
    $data = $request->all();

    $validasi = Validator::make($data, [
      'siswa_nama'  => 'required|min:2',
      'siswa_ortu'  => 'required|min:2'
    ]);


    if ($validasi->fails()) {
        return \Redirect::to('siswa')->with('err_msg',$validasi->errors()->all());
    }

    SiswaModel::find($data['siswa_id'])->update($data);
    return \Redirect::to('siswa')->with('sc_msg','Berhasil Mengedit Siswa');
  }
}
