<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    @if($data['page']['active'] == 'jurnal')
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">Jurnal</span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="{{ url('jurnal/today') }}"><i class="icon-pencil"></i>Tulis Jurnal</a></li>
        <li class="divider"></li>
        <li><a href="{{ url('jurnal/bulan') }}"><i class="icon-user"></i>Jurnal Bulan Ini</a></li>
        <li><a href="{{ url('jurnal/all') }}"><i class="icon-check"></i>Jurnal Semua</a></li>

      </ul>
    </li>

    @endif
    <ul class="nav navbar-nav navbar-right  ">
      <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">Logout</span></a></li>
    </ul>
  </ul>
</div>
<!--close-top-Header-menu-->
