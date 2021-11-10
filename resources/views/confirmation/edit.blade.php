@extends('layout.app')

@section('content')
    <div class="container bg rounded bg-primary py-2 mx-4">
        <h2 class="text-center text-white">
            Reschedule Meeting with {{ $confirmations->name }}
        </h2>
    </div>
    <div class="container ">
        <div class="form-group p-2 w-6/12">
            <form action="{{ route('confirmations.update', $confirmations->id) }}" method="POST">
                @csrf
            
                @method('PUT')
                <div class="container py-2">
                   
                    <input 
                        placeholder="Enter Your Name" 
                        class="form-control" 
                        name="name" 
                        type="hidden" 
                        value="{{ $confirmations->name }}">
                </div>

                <div class="container py-2">
                    <input 
                        placeholder="Enter Purpose of the Appointment" 
                        class="form-control" 
                        name="appointment_topic" 
                        type="hidden" 
                        value="{{ $confirmations->appointment_topic }}">
                </div>

                <div class="container py-2">
                    <input 
                        placeholder="Details of Appointment" 
                        class="form-control" 
                        name="appointment_details" 
                        type="hidden" 
                        value="{{ $confirmations->appointment_details }}">
                </div>

                <div class="container py-2">
                    <label for="date">Date</label>
                    <input 
                        type="date" 
                        class="form-control" 
                        name="date"
                        value="{{ $confirmations->date }}">
                </div>

                <div class="container py-2">
                    <label for="time">Time</label>
                    <input 
                        type="time" 
                        class="form-control" 
                        name="time"
                        value="{{ $confirmations->time }}">
                </div>


                <div class="container text-center py-2">
                    <a href="{{ route('appointment.confirm') }}" class="btn btn-danger ">Cancel</a>

                        <button type="submit" class="btn btn-primary">Reschedule</button>


                </div>
            </form>
        </div>
    </div>
@endsection