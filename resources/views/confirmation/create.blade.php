@extends('layout.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="container bg rounded bg-primary py-2 mx-4 ">
            <h2 class="text-center text-white">
                My Meeting 
            </h2>
        </div>
    </div>
    

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input <br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container d- justify-content-center ">
        <div class="form-group p-2 ">
            <form action="{{ route('meeting.store') }}" method="POST">
                @csrf
                 
                    <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
               
                    {{-- <input type="hidden" value="1" name="profile_id"> --}}
                
                <div class="container py-2">
                    <label for="name">Meeting With</label>
                    <input type="text" placeholder="I am meeting with ..." class="form-control" name="name">
                </div>

                <div class="container py-2">
                    <label for="appointment_topic">Topic of Meeting</label>
                    <input type="text" placeholder="Enter Purpose of the Appointment" class="form-control" name="appointment_topic">
                </div>

                <div class="container py-2">
                    <label for="appointment_details">Meeting Details</label>
                    <input type="text" placeholder="Details of Appointment" class="form-control" name="appointment_details">
                </div>

                <div class="container py-2">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" name="date">
                </div>

                <div class="container py-2">
                    <label for="time">Time</label>
                    <input type="time" class="form-control" name="time">
                </div>

               


                <div class="container text-center py-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection