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
  <body>

    <div class="container">
        <nav class="navbar nav navbar-expand justify-content-between">
          <ul class=" navbar-nav">
            @guest
                <li class="nav-item">
                  <a href="{{ route('home') }}" class="nav-link">Home</a> 
                </li>
            @endguest
              
              @auth
               
                 <li class="nav-item">
                    <a href="{{ route('appointment.index') }}" class="nav-link">Appointments</a> 
                </li>
                <li class="nav-item">
                    <a href="{{ route('appointment.confirm') }}" class="nav-link">Meetings</a> 
                </li> 
              @endauth

          </ul>

          <ul class="navbar-nav">

            @auth
                 <li class="nav-item">
                    <a href="{{ route('profile.show') }}" class="nav-link">{{ auth()->user()->name }}</a>
                </li>

                <li>
                  
                </li>

                <li class="nav-item">
                    {{-- <a href="" class="nav-link">Logout</a> --}}
                    <form action="{{ route('logout') }}" method="POST">
                      @csrf

                      <button type="submit" class="btn text-primary">Logout</button>
                    </form>
                </li>
            @endauth

            @guest
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Sign In</a>
                </li>
            @endguest
                

               
          </ul>
        </nav>

        
        <div class="container">
            @yield('content')
            <span >Designed by yours truly <span class="design">JayBee 2021 </span> </span>
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>