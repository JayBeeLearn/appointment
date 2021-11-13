@extends('layout.app')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="w-75 bg rounded bg-primary py-1 mx-4">
            <h2 class="text-center text-white">
            Sign Up
            </h2>
        </div>
    </div>
    
    <div class="container d-flex justify-content-center">
        <div class="form-group p-2">
            <form action="{{ route('auth.store') }}" method="POST">
                @csrf
            

                <div class="container py-2">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Enter Your Name" class="form-control" name="name">
                </div>

                <div class="container py-2">
                    <label for="name">Username</label>
                    <input type="text" placeholder="Choose A Username" class="form-control" name="username">
                </div>

                <div class="container py-2">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Enter Your Email" class="form-control" name="email">
                </div>

                <div class="container py-2">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Enter Your Password" class="form-control" name="password">
                </div>

                <div class="container py-2">
                    <label for="password_confirmation">Password Confirm</label>
                    <input type="password" placeholder="Enter Your Password" class="form-control" name="password_confirmation">
                </div>

            

                <div class="container text-center py-2">
                        <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>

            <div class="container">
                <p>
                    Already a User? 
                    <a href="{{ route('login') }}" class="">Login</a>
                </p>
            </div>
        </div>
    </div>
@endsection