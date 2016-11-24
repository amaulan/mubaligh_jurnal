@extends('layout.main')


@section('content')

  <div class="row-fluid">
    <div class="span12">
      <button type="button" class="btn btn-info" name="button">Export to Excel</button>
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Static table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Jurnal</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data['data']['jurnal_bulan'] as $index => $val)

                <tr class="odd gradeX">
                  <td>{{ $index }}</td>
                  <td>

                        <?php $warna = ['success','important','warning','primary','info','inverse']; $no = 0; ?>

                        @foreach($val as $val2)
                          <?php $rand = rand(0, count($warna)-1); ?>
                          <span class="label label-{{ $warna[$rand] }} tip-bottom"  style="padding:5px" da data-original-title="{{ $val2->deskripsi }}">{{ $val2->judul }}</span>
                        @endforeach
                  </td>
                </tr>
              @endforeach

              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>

@endsection
