@extends('layout.main')


@section('content')
<div class="row-fluid">
  <div class="span12">

    @include('errors.notif')


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
                Orang Tua
              </th>
              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach($data['data']['siswa'] as $val)
              <tr class="">
                <td>{{ $no }}</td>
                <td>{{ $val->siswa_nama }}</td>
                <td>{{ $val->siswa_ortu }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-info btn-mini" data-target="#modal-edit-{{$val->siswa_id}}" data-toggle="modal">Edit</button>
                  <a href="{{ url('siswa/delete/'.$val->siswa_id) }}" class="btn btn-danger btn-mini" name="button" onclick="return confirm('Yakin Menghapus')">Hapus</a>
                </td>
              </tr>
              <?php $no++; ?>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
      </div>
    </div>
@endsection


@section('modal')
<div id="modal-tambah" class="modal hide">
  <form action="{{ url('siswa/add') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Tambah Siswa</h3>
      </div>
      <div class="modal-body">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-content nopadding">
            <div class="control-group">
              <label class="control-label">Nama Lengkap</label>
              <div class="controls">
                <input type="text" name="siswa_nama" class="span11" placeholder="">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Orang Tua</label>
              <div class="controls">
                <input type="text" name="siswa_ortu" class="span11" placeholder="">
              </div>
            </div>
        </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <a data-dismiss="modal" class="btn btn-danger" href="#">Cancel</a>
      </div>
    </form>
  </div>

<!-- modal -->
@foreach($data['data']['siswa'] as $val)
<div id="modal-edit-{{ $val->siswa_id }}" class="modal hide">
  <form action="{{ url('siswa/update') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <input type="hidden" name="siswa_id" value="{{ $val->siswa_id }}">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Edit Siswa</h3>
      </div>
      <div class="modal-body">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-content nopadding">
            <div class="control-group">
              <label class="control-label">Nama Lengkap</label>
              <div class="controls">
                <input type="text" name="siswa_nama" class="span11" placeholder="" value="{{ $val->siswa_nama  }}">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Nama Orang Tua</label>
              <div class="controls">
                <input type="text" name="siswa_ortu" class="span11" placeholder="" value="{{ $val->siswa_ortu }}">
              </div>
            </div>
        </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <a data-dismiss="modal" class="btn btn-danger" href="#">Cancel</a>
      </div>
    </form>
  </div>
@endforeach

@endsection
