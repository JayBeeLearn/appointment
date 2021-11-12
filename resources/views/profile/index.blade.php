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
    
    <div class="container mx-4">
        @foreach ($profile as $user)
            <div class="row my-4 mr-4 user rounded p-4 d-flex justify-content-around">
                <div class=" col-sm-2 circle profilePix my-1" >
                    <img src="" alt="Profile Pix" width="155px" height="155px" class="rounded">
                    {{ $user->profile_picture }} 
                </div>
                
                <div class="col-sm-10 p-4 ">
                    <h4 class="">
                         <a href="{{ route('viewProfile', $user->id) }}" class=""> {{ $user->username }}</a>
                    </h4>
                     <div class="pl-2">
                        <span>{{ $user->gender }}</span> 
                    </div>
                    <div class="pl-2">
                        <p><small> Works at</small> <span class="workplace">{{ $user->work_place }}</span>   </p>
                    </div>
                </div>
                   
            </div>
        @endforeach
    </div>

    {{ $profile->links() }}
            

@endsection