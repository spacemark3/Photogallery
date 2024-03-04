<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title> @yield('title', 'Home') </title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded" aria-label="Eleventh navbar example">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">Photogallery</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria- s="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">

                @auth
                <a class="nav-link active" aria-current="page" href="{{route('albums.index')}}"> ALBUMS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('albums.create')}}">NEW ALBUM</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('photos.create')}}">NEW IMAGE</a>
            </li>
              @endauth
              
          </ul>
              @guest
              <ul class="navbar-nav ml-auto">
                <li class="nav-item"> 
                  <a class="nav-link" href="{{route('login')}}"> LOGIN </a>
              </li>
              <li class="nav-item"> 
                <a class="nav-link" href="{{route('register')}}"> REGISTER </a>
             </li>
             </ul>
              @endguest

              @auth
              <ul class="navbar-nav ml-auto">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle  nav-link" data-bs-toggle="dropdown" role="button"
                   aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li>

                        <form id="logout-form" action="{{ route('logout')}}" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-default">Logout</button>
                        </form>
                    </li>
                </ul>
            </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>

    <main role="main" class="container-fluid">
    @yield('content')
    </main><!-- /.container -->
    @section('footer')
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
            crossorigin="anonymous"></script>
    @show
</body>
</html>