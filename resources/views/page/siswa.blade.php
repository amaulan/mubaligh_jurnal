@extends('layout.main')


@section('content')
<div class="row-fluid">
  <div class="span12">
    <div class="btn-group">
              <button data-toggle="dropdown" class="btn btn-info dropdown-toggle">Kelas <span class="caret"></span></button>
              <ul class="dropdown-menu">
                <li><a href="#">1</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">1</a></li>
              </ul>
    </div>
    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah Siswa</button>
    <br><br>
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Static table</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Siswa</th>
              <th>
                Kelas
              </th>
              <th>
                Orang Tua
              </th>
              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="">
              <td>1</td>
              <td>Ayat Maulana</td>
              <td>
                1
              </td>
              <td>Akhmad</td>
              <td class="text-center">
                <button type="button" class="btn btn-info btn-mini" name="button">Edit</button>
                <button type="button" class="btn btn-danger btn-mini" name="button">Hapus</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
      </div>
    </div>
@endsection


@section('modal')
<div id="modal-tambah" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Tambah Siswa</h3>
      </div>
      <div class="modal-body">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Nama Lengkap</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Orang Tua</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Kelas</label>
              <div class="controls">
                <select class="span11" name="kelas_id">
                  <option value="option">1</option>
                  <option value="option">1</option>
                  <option value="option">1</option>
                </select>
              </div>
            </div>
          </form>
        </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" name="button" class="btn btn-success">Save</button>
        <a data-dismiss="modal" class="btn btn-danger" href="#">Cancel</a>
      </div>
  </div>

@endsection
