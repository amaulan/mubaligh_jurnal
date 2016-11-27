@include('layout.part.header')
@include('layout.part.nav')
@include('layout.part.sidebar')



<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-user"></i> Siswa</a>
    </div>
    <h1>{{ $data['page']['title'] }}</h1>
  </div>
<!--End-breadcrumbs-->


  <div class="container-fluid">
    <hr>
        @yield('content')
  </div>
</div>
</div>

@yield('modal')

@include('layout.part.footer')
