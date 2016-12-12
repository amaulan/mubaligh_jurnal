@include('layout.part.header')
@include('layout.part.nav')
@include('layout.part.sidebar')



<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb">
      <a href="{{ url('/') }}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      @foreach($data['breadcumb'] as $bread)
        <a href="{{ $bread['link'] }}" title="" class="tip-bottom"><i class="{{ $bread['icon'] }}"></i>{{ $bread['text'] }}</a>
      @endforeach
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
