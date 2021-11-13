@extends('layout.app')

@section('content')
    <div class="rounded bg-primary py-1 mx-4">
        <h2 class="text-center text-white">
           Sign In
        </h2>
    </div>
    <div class="container mt-2">
            @if ($message = Session::get('message'))
                <div class="alert alert-danger">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
    <div class="container d-flex justify-content-around">
        <div class="form-group p-2 mx-8">
            <form action="{{ route('login') }}" method="post">
                @csrf
            
                <div class="container py-2 ">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Your Email" class="form-control" name="email">
                </div>

                <div class="container py-2  ">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Your Password" class="form-control" name="password">
                </div>

                <div class="container py-2  ">
                    <input type="checkbox"class="mr-2" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>

                

                <div class="container text-center py-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>

            <div class="container">
                <p>
                    New User? 
                    <a href="{{ route('register') }}" class="">Sign Up</a> to start managing your appointment and meetings 
                </p>
            </div>
        </div>
    </div>
@endsection