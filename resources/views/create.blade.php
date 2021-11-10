@extends('layout.app')

@section('content')
    <div class="container bg rounded bg-primary py-2 mx-4">
        <h2 class="text-center text-white">
            Make An Appointment 
        </h2>
    </div>
    <div class="container ">
        <div class="form-group p-2">
            <form action="{{ route('appointment.store') }}" method="POST">
                @csrf
            
                
                <div class="container py-2">
                    <label for="name">Name</label>
                    <input type="text" placeholder="Enter Your Name" class="form-control" name="name">
                </div>

                <div class="container py-2">
                    <label for="appointment_topic">Topic of Appointment</label>
                    <input type="text" placeholder="Enter Purpose of the Appointment" class="form-control" name="appointment_topic">
                </div>

                <div class="container py-2">
                    <label for="appointment_details">Appointment Details</label>
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

                <div class="container py-2">
                    <input type="integer" placeholder="Enter Appointed id" value="" name="appointed">
                </div>

                <div class="container py-2">
                    <input type="integer"  placeholder="Enter Appointed id"  name="appointee">
                </div>

                {{-- <div class="container py-2">
                    <input type="hidden" value="{{ auth()->user()->id }}" name="appointee">
                </div> --}}


                <div class="container text-center py-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection