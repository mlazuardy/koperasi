<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>KBUM TENJOLAYA</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="{{asset('css/alert.css')}}">
    @yield('css')
       <script>
        window.App = {!! json_encode([
            'csrfToken' => csrf_token(),
            'user' => Auth::user(),
            'signedIn' => Auth::check()
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/">KBUM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
@auth
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a href="{{url('costumer')}}" class="nav-link {{Request::is('costumer') ? 'active' :''}} ">Daftar Anggota</a>
      </li>
       <li class="nav-item">
        <a href="{{url('loan')}}" class="nav-link {{Request::is('loan') ?'active':''}}">Daftar Pinjaman</a>
      </li>
    </ul>
    
   <ul class="navbar-nav navbar-right">
     @if(Auth::user()->role->name == 'staff')
     <li class="nav-item">
       <a href="{{url('staff')}}" class="nav-link">Staff</a>
     </li>
     @endif
      <li class="nav-item">
      <a href="{{url('users')}}" class="nav-link">{{Auth::user()->name}}</a>
      </li>
      <li class="nav-item">
        <a class="btn btn-danger btn-outline-light" href="{{route('logout')}}"
                            onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"
        class="nav-link">Logout</a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
          </form>
      </li>
   </ul>
   @endauth
  </div>
</nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/alert.js')}}"></script>
      @include('sweet::alert')
    @yield('js')
</body>
</html>
