@extends('layout.app')

@section('content')
    <div class="container bg rounded bg-primary py-2 mx-4">
        <h2 class="text-center text-white">
            Reschedule Appointment with {{ $appointment->name }}
        </h2>
    </div>
    <div class="container ">
        <div class="form-group p-2 w-6/12">
            <form action="{{ route('appointment.update', $appointment->id) }}" method="POST">
                @csrf
            
                @method('PUT')
                <div class="container py-2">
                   
                    <input 
                        placeholder="Enter Your Name" 
                        class="form-control" 
                        name="name" 
                        type="hidden" 
                        value="{{ $appointment->name }}">
                </div>

                <div class="container py-2">
                    <input 
                        placeholder="Enter Purpose of the Appointment" 
                        class="form-control" 
                        name="appointment_topic" 
                        type="hidden" 
                        value="{{ $appointment->appointment_topic }}">
                </div>

                <div class="container py-2">
                    <input 
                        placeholder="Details of Appointment" 
                        class="form-control" 
                        name="appointment_details" 
                        type="hidden" 
                        value="{{ $appointment->appointment_details }}">
                </div>

                <div class="container py-2">
                    <label for="date">Date</label>
                    <input 
                        type="date" 
                        class="form-control" 
                        name="date"
                        value="{{ $appointment->date }}">
                </div>

                <div class="container py-2">
                    <label for="time">Time</label>
                    <input 
                        type="time" 
                        class="form-control" 
                        name="time"
                        value="{{ $appointment->time }}">
                </div>


                <div class="container text-center py-2">
                    <a href="{{ route('appointment.index') }}" class="btn btn-danger ">Cancel</a>

                        <button type="submit" class="btn btn-primary">Reschedule</button>


                </div>
            </form>
        </div>
    </div>
@endsection