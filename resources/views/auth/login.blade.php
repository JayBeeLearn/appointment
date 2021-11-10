@extends('layout.app')

@section('content')
    <div class="rounded bg-primary py-1 mx-4">
        <h2 class="text-center text-white">
           Sign In
        </h2>
    </div>
    <div class="container d-flex justify-content-around">
        <div class="form-group p-2 mx-8">
            <form action="{{ route('login') }}" method="post">
                @csrf
            
                <div class="container py-2 text-center">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Your Email" class="form-control" name="email">
                </div>

                <div class="container py-2  text-center">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Your Password" class="form-control" name="password">
                </div>

                

                <div class="container text-center py-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            <div class="container">
                <p>
                    New User? 
                    <a href="{{ route('register') }}" class="">Sign Up</a>
                </p>
            </div>
        </div>
    </div>
@endsection