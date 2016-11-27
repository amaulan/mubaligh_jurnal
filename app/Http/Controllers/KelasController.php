<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\KelasModel;

use Redirect;
use Validator;

class KelasController extends Controller
{
    public function index(){
        $data['page']['active'] = 'kelas';
        $data['page']['title']  = 'Kelas';


        $data['data']['kelas']  = KelasModel::orderBy('kelas_id','desc')->get();


        // return $data;
        return view('page.kelas', compact('data'));
    }

    public function create(Request $request){
        $data = $request->all();

        $validasi = Validator::make($data, [
        'kelas_nama'  => 'required|min:1|max:30',
        ]);


        if ($validasi->fails()) {
            return \Redirect::to('kelas')->with('err_msg',$validasi->errors()->all());
        }

        kelasModel::create($data);
        return \Redirect::to('kelas')->with('sc_msg','Berhasil Menambah kelas');
    }

    public function update(Request $request){
        $data = $request->all();

        $validasi = Validator::make($data, [
        'kelas_nama'  => 'required|min:1|max:30',
        ]);


        if ($validasi->fails()) {
            return \Redirect::to('kelas')->with('err_msg',$validasi->errors()->all());
        }

        KelasModel::find($data['kelas_id'])->update($data);
        return \Redirect::to('kelas')->with('sc_msg','Berhasil Mengedit Kelas');
    }

    public function destroy($kelas_id){
        $kelas = KelasModel::find($kelas_id);
        $kelas_nama = $kelas->kelas_nama;

        if (!count($kelas)) {
            return \Redirect::to('kelas')->with('err_msg','Kelas Tidak Ada');
        }

        $kelas->delete();
        return \Redirect::to('kelas')->with('sc_msg','Berhasil Menghapus kelas '.$kelas_nama);
    }
}

