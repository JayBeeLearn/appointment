@extends('layout.app')

@section('content')


    <div class="container bg rounded bg-primary py-2">
        <h2 class="text-center text-white">My Profile </h2>
    </div>

     @foreach ($pro as $prof)
    <div class="container mx-8">
        <div class="container">
            <div class="row d-flex justify-content-between py-2 ">
                <div class="my-1">
                    <a href="{{ route('appointment.index')}}" class="btn btn-info">Back To Appointments</a>
                </div>
                <div class="my-1">
                    <a href="{{ route('profile.edit', $prof->id)}}" class="btn btn-info">Edit Profile</a>
                </div>
            </div>
            <div class="container">
                <div class="row my-4">
                    <div class="col-lg-6">
                        <div class="card">
                            <h3 class="card-title head "> Profile Photo</h3>
                               <div class="card-block profilePic justify-content-center" >
                                     <img src="{{ asset('/uploads/profilePics/'. $prof->profile_photo) }}" alt="" width="155px" height="155px" class="card-img-top " >
                                    {{-- <img src="{{ url('img/rob.jpg') }}" alt="" width="155" height="155" class="card-img-top img-fluid"> --}}
                               </div>
                               

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card my-2">
                            <h3 class="card-title head"> Bio</h3>
                            <div class="card-block display">
                                <h6>{{ $prof->description }}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                   <div class="col-lg-6">
                        <div class="card my-2">
                            <h3 class="card-title head "> Username</h3>
                            <div class="card-block display">
                                <h6>{{ $prof->username }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card my-2">
                            <h3 class="card-title head"> Gender</h3>
                            <div class="card-block display">
                                <h6>{{ $prof->gender }}</h6>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row my-4">
                    <div class="col-lg-6">
                        <div class="card my-2">
                            <h3 class="card-title head"> Works At</h3>
                            <div class="card-block display">
                                <h6>{{ $prof->work_place }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card my-2">
                            <h3 class="card-title head"> Mail</h3>
                            <div class="card-block display">
                                <h6>{{ $prof->user->email }}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                
            </div>
                 
            @endforeach
        </div>
           

           

        <div class="container">
            {{-- <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-warning"> Reschedule</a> --}}
        </div>
                        
                    
        
    </div>
    
    
@endsection