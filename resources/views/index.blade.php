@extends('layout.app')

@section('content')

<div class="container">
    @include('include.search')

    <div class="d-flex flex-column justify-content-between">
        <a href="#search" class="btn btn-primary my-4 mx-4 p-3 rounded text-white">
                <h3>Locate a Client or Business and Book for an Appointment </h3>
        </a>
        
        @guest
            <a href="{{ route('register') }}" class="btn btn-success my-4 mx-4 p-3 rounded text-white">
                    <h3>Make it easier for clients and customers to locate you for fast appointments </h3>
            </a>
        

            <a href="{{ route('login') }}" class="btn btn-info my-4 mx-4 p-3 rounded text-white">
                    <h3> Organize all your meetings and appointments in one place </h3>
            </a>
        @endguest
    </div>
</div>

<script>
    
</script>
    
@endsection