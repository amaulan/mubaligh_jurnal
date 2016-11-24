@if(Session::has('sc_msg'))
  <div class="alert alert-success alert-block">
    <a class="close" data-dismiss="alert" href="#">×</a>
      <h4 class="alert-heading">Berhasil !</h4>
      {{ Session::get('sc_msg') }}
  </div>
@endif


@if(Session::has('err_msg'))

<div class="alert alert-danger alert-block">
  <a class="close" data-dismiss="alert" href="#">×</a>
    <h4 class="alert-heading">Gagal !</h4>
    @if(is_array(Session::get('err_msg')))
      <ul>
        @foreach(Session::get('err_msg') as $err)
          <li>{{$err}}</li>
        @endforeach
      </ul>
    @else
      {{ Session::get('err_msg') }}
    @endif

</div>
@endif
