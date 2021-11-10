@extends('layout.app')

@section('content')

<div class="container justify-content-end col-lg-12 margin-tb">

    {{-- The Search bar for locating users  --}}
    <div class="container d-flex justify-content-end">
        <div class=" search ">
            <form action="{{ route('profile') }}" method="GET" role="search">
                <input type="search" name="search" id="search" class="no-outline " placeholder="Locate a user"> 
                <button type="submit" class="inline "><i class="fa fa-search"></i></button>
            </form>
        </div> 
    </div>
    

    <div class="container d-flex flex-column justify-content-between">
        <a href="{{ route('profile') }}">
            <button type="button" onclick="function focusMethod()" data-target="search" class="container bg bg-primary my-4 mx-4 p-3 rounded text-white">
                <h1>Locate a Client or Business and Book for an Appointment </h1>
            </button>
        </a>
        
        @guest
            <a href="{{ route('register') }}">
                <button class="container bg bg-success my-4 mx-4 p-3 rounded text-white">
                    <h1>Make it easier for clients and customers to locate you for fast appointments </h1>
                </button>
            </a>
        

            <a href="{{ route('login') }}">
                <button class="container bg bg-info my-4 mx-4 p-3 rounded text-white">
                    <h1> Organize all your meetings and appointments in one place </h1>
                </button>
            </a>
        @endguest
    </div>
</div>

<script>
    
</script>
    
@endsection