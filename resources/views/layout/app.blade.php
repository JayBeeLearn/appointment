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

        <nav class="navbar navbar-toggleable-sm bg-danger navbar-inverse">
          <div class="container">
            <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNav"> 
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="mainNav">
                <div class="container collapse navbar-collapse justify-content-between" id="mainNav">
                  <div class="navbar-nav">
                      @guest
                            <a href="{{ route('home') }}" class="nav-item nav-link">Home</a> 
                      @endguest
                      @auth
                        <a href="{{ route('appointment.index') }}" class="nav-item nav-link">Appointments</a> 
                        <a href="{{ route('appointment.confirm') }}" class="nav-item nav-link">Meetings</a> 
                      @endauth
                  </div>
                  <div class="navbar-nav">
                       @auth
                          <a href="{{ route('profile.show') }}" class="nav-item nav-link">{{ auth()->user()->name }}</a>
                          {{-- <a href="" class="nav-link">Logout</a> --}}
                          <form action="{{ route('logout') }}" method="POST">
                            @csrf
                              <button type="submit"  class="btn text-primary nav-item nav-link ">Logout</button>
                          </form>
                      @endauth

                       @guest
                          <a href="{{ route('register') }}" class="nav-item nav-link">Sign Up</a>
                          <a href="{{ route('login') }}" class="nav-item nav-link">Sign In</a>
                        @endguest
                  </div> 

                     
                          

                        
                    </ul>
                </div>
            </div>
          </div>
        </nav>

        
        <div class="container my-1">
            @yield('content')
            <div class="container d-flex-justify-content-center">
                <div class="signature" >Designed by yours truly <span class="design">
                  <a href="https://www.facebook.com/jahaziel.uko.1">JayBee 2021</a>  </span> </div>
            </div>
            
        </div>
    </div>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>