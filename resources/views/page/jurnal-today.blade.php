@extends('layout.main')
<script src="../assets/jquerypic.js"></script>
@section('content')
<div class="row-fluid">
  @include('errors.notif')
</div>
@if(isset($data['info']['edit']))
<div class="row-fluid">
  @if(isset($data['info']['edit']))
    <a href="{{ url('jurnal/today') }}" class="btn btn-success">Tulis Jurnal</a>
  @endif
  <a href="{{ url('jurnal/export/today') }}" class="btn btn-info">Export to Excel</a>
</div>
@endif
<div class="row-fluid">

  <div class="span6">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-file"></i> </span>
      <h5>Jurnal Hari Ini</h5>
    </div>
    <div class="widget-content nopadding">
      <ul class="recent-posts">
        @foreach($data['data']['jurnal'] as $val)
        <li>
          <div class="user-thumb" style="background:transparent !important"> <span class="label label-warning"><strong>{{ date('H:i', $val->tanggal) }}</strong></span>
        </div>
        <div class="article-post">
          <div class="fr">
            <a href="{{ url('jurnal/edit/'.$val->jurnal_id) }}" class="btn btn-primary btn-mini">Edit</a>
            <a onclick="return confirm('Yakin Menghapus ?')" href="{{ url('jurnal/delete/'.$val->jurnal_id) }}" class="btn btn-danger btn-mini">Delete</a></div>
            <span class="user-info"><strong>{{ $val->judul }}</strong></span>
            <p><a href="#">{{ $val->deskripsi }}</a> </p>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>
<div class="span6">
  <div class="widget-box">
    <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
    <h5>Tulis Jurnal</h5>
  </div>
  <div class="widget-content nopadding">
    @if(isset($data['info']['edit']))
    <form action="{{ url('jurnal/update') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
      @else
      <form action="{{ url('jurnal/today/add') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
        @endif
        {{ csrf_field() }}
        @if(isset($data['info']['edit']))
        <input type="hidden" name="jurnal_id" value="{{ $data['data']['jurnal_edit']->jurnal_id }}">
        @endif
        <div class="control-group">
          <label class="control-label">Judul :</label>
          <div class="controls">
            @if(isset($data['info']['edit']))
            <input type="text" name="judul" class="span11" value="{{ $data['data']['jurnal_edit']->judul }}" >
            @else
            <input type="text" name="judul" class="span11" value="" >
            @endif
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Deskripsi :</label>
          <div class="controls">
            @if(isset($data['info']['edit']))
            <textarea name="deskripsi" rows="8" cols="40" class="span11">{{ $data['data']['jurnal_edit']->deskripsi }}</textarea>
            @else
            <textarea name="deskripsi" rows="8" cols="40" class="span11"></textarea>
            @endif
          </div>
        </div>
        <div class="control-group" for="image-upload">
          <label class="control-label">Pic</label>
          <div class="controls">
            <input type="file" name="file" id="profile-img">
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Kelas</label>
          <div class="controls">
            <select class="" name="kelas_id">
              @if(isset($data['info']['edit']))
              @foreach($data['data']['kelas'] as $val)
              <option value="{{ $val->kelas_id }}" <?php if($val->kelas_id == $data['data']['jurnal_edit']->kelas_id){ echo 'selected'; } ?> >{{ $val->kelas_nama }}</option>
              @endforeach
              @else
              @foreach($data['data']['kelas'] as $val)
              <option value="{{ $val->kelas_id }}">{{ $val->kelas_nama }}</option>
              @endforeach
              @endif
            </select>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Siswa</label>
          <div class="controls">
            @if(isset($data['info']['edit']))
            <select multiple style="height:300px;" name="siswa_id[]">
              @foreach($data['data']['siswa'] as $val)
              <option value="{{ $val->siswa_id }}" <?php if(in_array($val->siswa_id,json_decode($data['data']['jurnal_edit']->kehadiran,TRUE))){ echo 'selected'; } ?>>{{ $val->siswa_nama }}</option>
              @endforeach
            </select>
            @else
            <select multiple style="height:300px;" name="siswa_id[]">
              @foreach($data['data']['siswa'] as $val)
              <option value="{{ $val->siswa_id }}" >{{ $val->siswa_nama }}</option>
              @endforeach
            </select>
            @endif
          </div>
        </div>
        <div class="form-actions">
          <button type="submit" class="btn btn-success">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
