@extends('layout.app')

@section('content')


    <div class="container bg rounded bg-primary py-2">
        <h2 class="text-center text-white">{{ $profile->username }}'s Profile </h2>
    </div>

     {{-- @foreach ($profile as $prof) --}}
    <div class="container mx-8">
        <div class="container">
            <div class="row d-flex justify-content-between py-2">
                <div class="my-1">
                    <a href="{{ route('profile')}}" class="btn btn-info">Back</a>
                </div>

                 <div class="my-1">
                    <a href="{{ route('appointment.create', $profile->id) }}" class="btn btn-success"> Make Appointment with {{ $profile->username }}</a>

                </div>
                
            </div>
            <div class="container">
                <div class="row my-4">
                    <div class="col-lg-6">
                        <div class="card">
                            <h3 class="card-title head "> Profile Photo</h3>
                               
                                <img src="{{ asset('/uploads/profilePics/1636555271.png') }}" alt="" width="155px" height="155px" class="card-img-top " >
                                {{-- <img src="{{ url('img/rob.jpg') }}" alt="" width="155" height="155" class="card-img-top img-fluid"> --}}

                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card my-2">
                            <h3 class="card-title head"> Bio</h3>
                            <div class="card-block display">
                                <h6>{{ $profile->description }}</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                   <div class="col-lg-6">
                        <div class="card my-2">
                            <h3 class="card-title head "> Name</h3>
                            <div class="card-block display">
                                <h6>{{ $profile->user->name }}</h6>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card my-2">
                            <h3 class="card-title head"> Gender</h3>
                            <div class="card-block display">
                                <h6>{{ $profile->gender }}</h6>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row my-4">
                    <div class="col-lg-6">
                        <div class="card my-2">
                            <h3 class="card-title head"> Works At</h3>
                            <div class="card-block display">
                                <h6>{{ $profile->work_place }}</h6>
                            </div>
                        </div>
                    </div>

                   
                </div>

                
            </div>
                 
            {{-- @endforeach --}}
        </div>
           

           

        <div class="container">
            {{-- <a href="{{ route('profile.edit', $profile->id) }}" class="btn btn-warning"> Reschedule</a> --}}
        </div>
                        
                    
        
    </div>
    
    
@endsection