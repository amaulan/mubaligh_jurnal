@extends('layout.main')


@section('content')
<div class="row-fluid">
  <div class="span12">

    @include('errors.notif')

     <div class="row-fluid">
       <div class="span12">
         <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Personal-info</h5>
        </div>
        <div class="widget-content nopadding">
          <form action="#" method="get" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Nama Lengkap :</label>
              <div class="controls">
                <input class="span11" type="text">
              </div>
            </div>
            <div class="control-group">
             <label class="control-label">Tanggal Lahir</label>
             <div class="controls">
               <div data-date="12-02-2012" class="input-append date datepicker">
                 <input type="text" value="12-02-2012"  data-date-format="mm-dd-yyyy" class="span11" >
                 <span class="add-on"><i class="icon-th"></i></span>
               </div>
             </div>
           </div>
            <div class="control-group">
              <label class="control-label">Tempat Lahir :</label>
              <div class="controls">
                <input class="span11" type="text">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Alamat</label>
              <div class="controls">
                <textarea class="span11" ></textarea>
              </div>
            </div>

            <div class="form-actions">
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </form>
        </div>
      </div>
       </div>
     </div>
    </div>



@endsection
