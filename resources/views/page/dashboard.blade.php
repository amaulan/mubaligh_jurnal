@extends('layout.main')


@section('content')
<div class="row-fluid">
  <div class="span12">

    @include('errors.notif')

     <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-signal"></i> </span>
            <h5>Bar chart</h5>
          </div>
          <div class="widget-content">
            <div class="chart"></div>
          </div>
        </div>
      </div>
    </div>


   
@endsection



