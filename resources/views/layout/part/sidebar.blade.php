<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li id="dashboard"><a href="{{ url('dashboard') }}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li id="profil"><a href="{{ url('profil') }}"><i class="icon icon-th"></i> <span>Profil</span></a></li>
    <li id="jurnal" class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Jurnal</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="{{ url('jurnal/tulis') }}">Tulis Jurnal</a></li>
        <li><a href="{{ url('jurnal/bulan') }}">Jurnal Bulan ini</a></li>
        <li><a href="{{ url('jurnal/all') }}">Lihat Jurnal</a></li>
      </ul>
    </li>
    <li id="siswa"><a href="{{ url('siswa') }}"><i class="icon icon-user"></i> <span>Siswa</span></a></li>
</div>
<!--sidebar-menu-->
