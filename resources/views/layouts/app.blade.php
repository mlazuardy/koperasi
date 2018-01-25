<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Koperasi</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" media="all">
    @yield('css')
</head>
<body>
    <div id="app">
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Koperasi</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
@auth
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a href="{{url('costumer')}}" class="nav-link">Daftar Konsumen</a>
      </li>
       <li class="nav-item">
        <a href="#" class="nav-link">Daftar Pinjaman</a>
      </li>
    </ul>
    
   <ul class="navbar-nav navbar-right">
      <li class="nav-item">
        <a href="#" class="nav-link">My Profile</a>
      </li>
      <li class="nav-item">
        <a href="{{route('logout')}}"
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
    @yield('js')
</body>
</html>
