@extends('layout.main')


@section('content')
<div class="row-fluid">
  <div class="span12">

    @include('errors.notif')

     <div class="row-fluid">
       <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
            <h5>Gallery</h5>
          </div>
          <div class="widget-content">
            <ul class="thumbnails">
              @foreach ($data['data']['galeri'] as $key => $value)
                <?php
                echo $value->pic;
                die();
                if ($value->pic == null) {
                  break;
                }

                // $data_img = json_decode($value->pic, TRUE);
                ?>
                {{-- @foreach ($data_img as $key2 => $value2)
                  <li class="span2"> <a> <img src="{{ url('upload/'.$value2) }}" alt=""> </a>
                    <div class="actions">
                      <a class="lightbox_trigger" href="{{ url('upload/'.$value2) }}"><i class="icon-search"></i></a>
                    </div>
                  </li>
                @endforeach --}}
              @endforeach

            </ul>
          </div>
        </div>
      </div>

    </div>



@endsection
