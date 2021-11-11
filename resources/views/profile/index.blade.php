@extends('layout.app')

@section('content')


@include('include.search')

     <div type="submit" class="container text-center rounded my-2 justify-content-center bg-primary" >
         <a href="#search" class="btn "> 
             <h2 class=" text-white">
                Locate your friends and business associates
            </h2>
        </a>
    </div>
    
    <div class=" ">
        @foreach ($profile as $user)
            <div class="row">
                <div class=" col-sm-4 circle">
                    coma 
                </div>
                <div class="col-sm-8 ">
                    <h4 class="">
                         <a href="{{ route('viewProfile', $user->id) }}" class=""> {{ $user->username }}</a>
                    </h4>
                    

                     <div class="col">
                        <small>{{ $user->gender }}</small> 
                    </div>
                    <div class="col">
                        <p>Works at <h6>{{ $user->work_place }} </h6> </p>
                    </div>
                </div>
                   
            </div>
        @endforeach
    </div>

    {{ $profile->links() }}
            

@endsection