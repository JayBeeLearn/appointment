@extends('layout.app')

@section('content')


@include('include.search')

    <div type="submit" class="text-center rounded my-2 justify-content-center bg-primary" >
        <a href="#search" class="btn "> 
             <h2 class=" text-white">
                Locate your friends and business associates
            </h2>
        </a>
    </div>
    
    <div class="container mx-2">
        @foreach ($profile as $user)
            <div class="row my-4 mr-4 user rounded p-2 d-flex justify-content-around">
                <div class=" col-sm-4" >
                    <img src="{{ asset('/uploads/profilePics/'. $user->profile_photo) }}" alt="Profile Pix" width="155px" height="155px" class="profilePicture">
                    {{ $user->profile_picture }} 
                </div>
                
                <div class="col-sm-8 p-2 centerVertical">
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