@extends('layout.main')


@section('content')
<div class="row-fluid">
  @include('errors.notif')
</div>

@if(isset($data['info']['edit']))
<div class="row-fluid">
  <a href="{{ url('jurnal/today') }}" class="btn btn-success">Tulis Jurnal</a>
</div>
@endif

<div class="row-fluid">
  <div class="span12">

    <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-time"></i></span>
            <h5>Rekap Jurnal Pertahun</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-striped table-bordered data-table">
              <thead>
                <tr>
                  <th>Tahun</th>
                  <th>Jumlah Jurnal</th>
                  <th>Opsih</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data['data']['tahun'] as $key => $value)
                  <tr>
                    <td class="taskDesc"><i class="icon-ok-sign"></i> <strong>{{ $value['tahun'] }}</strong></td>
                    <td class="taskOptions"><span class="badge badge-info">{{ $value['jumlah'] }}</span></td>
                    <td class="taskStatus">
                      <a href="{{ url('jurnal/tahun/'.$value['tahun']) }}"><span class="btn btn-mini btn-success">Lihat Jurnal</span></a>
                      <a href="{{ url('jurnal/export/'.$value['tahun']) }}"><span class="btn btn-mini btn-warning">Export to Excel</span></a>
                    </td>
                  </tr>
                @endforeach

              </tbody>
            </table>
          </div>
        </div>
</div>
      @endsection
