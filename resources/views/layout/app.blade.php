<!doctype html>
<html lang="en">
  <head>
    <title>Apointment Manager</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    {{-- External CSS  --}}
    <link rel="stylesheet" href="{{ url('css/app.css') }}">  

    {{-- External JavaScript --}}
    <script src="{{ url('js/main.js') }}"></script>
    
  </head>
  <body class="bg bg-light">
      <nav class="navbar navbar-expand-lg navbar-light navbar-inverse" style="background-color: #e3f2fd;">
          <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="mainNav">
                <div class="container collapse navbar-collapse justify-content-between" id="mainNav">
                  <ul class="navbar-nav ">
                      @guest
                          <li class="nav-item">
                              <a href="{{ route('home') }}" class=" nav-link text-primary">Home</a> 
                          </li>  
                      @endguest
                      @auth
                        <li class="nav-item ">
                          <a href="{{ route('appointment.index') }}" class="nav-link text-primary">Appointments</a> 
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('appointment.confirm') }}" class="nav-link text-primary">Meetings</a> 
                        </li>
                      @endauth
                  </ul>

                  <ul class="navbar-nav">
                       @auth
                       <li class="nav-item">
                            <a href="{{ route('profile.show') }}" class="nav-link text-primary"> {{ auth()->user()->name }}</a>
                             {{-- <a href="" class="nav-link">Logout</a> --}}
                       </li>
                         
                          
                          <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                              @csrf
                                <button type="submit"  class="btn text-primary  nav-link ">Logout</button>
                            </form>
                          </li>
                      @endauth

                       @guest
                          <a href="{{ route('register') }}" class="nav-item nav-link text-primary">Sign Up</a>
                          <a href="{{ route('login') }}" class="nav-item nav-link text-primary">Sign In</a>
                        @endguest
                  </ul> 
                </div>
            </div>
          </div>
        </nav>

        
      <div class="container my-1">
          @yield('content')
          
      </div>
   
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
  <footer class="container footer">
     @include('include.designby')
  </footer>
</html>