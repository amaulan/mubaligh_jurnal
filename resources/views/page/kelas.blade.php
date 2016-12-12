@extends('layout.main')


@section('content')
<div class="row-fluid">
  <div class="span12">

    @include('errors.notif')


    <button class="btn btn-success pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah Kelas</button>
    <br><br>
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
        <h5>Data Kelas</h5>
      </div>
      <div class="widget-content nopadding">
        <table class="table table-bordered table-striped data-table">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Kelas</th>
              <th>
                Action
              </th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            @foreach($data['data']['kelas'] as $val)
              <tr class="">
                <td>{{ $no }}</td>
                <td>{{ $val->kelas_nama }}</td>
                <td class="text-center">
                  <button type="button" class="btn btn-info btn-mini" data-target="#modal-edit-{{$val->kelas_id}}" data-toggle="modal">Edit</button>
                  <a href="{{ url('kelas/delete/'.$val->kelas_id) }}" class="btn btn-danger btn-mini" name="button" onclick="return confirm('Yakin Menghapus')">Hapus</a>
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
  <form action="{{ url('kelas/add') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Tambah Kelas</h3>
      </div>
      <div class="modal-body">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-content nopadding">
            <div class="control-group">
              <label class="control-label">Nama Kelas</label>
              <div class="controls">
                <input type="text" name="kelas_nama" class="span11" placeholder="">
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
@foreach($data['data']['kelas'] as $val)
<div id="modal-edit-{{ $val->kelas_id }}" class="modal hide">
  <form action="{{ url('kelas/update') }}" method="POST" class="form-horizontal">
    {{ csrf_field() }}
    <input type="hidden" name="kelas_id" value="{{ $val->kelas_id }}">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button">×</button>
        <h3>Edit Kelas</h3>
      </div>
      <div class="modal-body">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-content nopadding">
            <div class="control-group">
              <label class="control-label">Nama Kelas</label>
              <div class="controls">
                <input type="text" name="kelas_nama" class="span11" placeholder="" value="{{ $val->kelas_nama  }}">
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
