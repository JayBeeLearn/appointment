@extends('layout.app')

@section('content')


    <div class="container bg rounded bg-primary py-2">
        <h2 class="text-center text-white">My Appointment with {{ $appointment->name }}</h2>
    </div>


    <div class="container mx-8">
        <table class="table table-bordered my-4">
            <tr>
                <th>Contact Person</th>
                <td>
                    {{-- <a href="{{ route('viewProfile', $profile->id) }}"> --}}
                        {{ $appointment->name }}
                    </a>
                </td>
            </tr>

            <tr>
                <th>Purpose of Meeting</th>
                <td> <h5>{{ $appointment->appointment_topic }}</h5></td>
            </tr>

            <tr>
                <th>Details</th>
                <td>{{ $appointment->appointment_details }}</td>
            </tr>

            <tr>
                <th>Date of Appointment</th>
                <td>{{ $appointment->date }}</td>
            </tr>

            <tr>
                <th>Time of Appointment</th>
                <td>{{ $appointment->time }}</td>
            </tr>
        </table>

        <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST">

                        
                    <a href="{{ route('appointment.edit', $appointment->id) }}" class="btn btn-warning"> Reschedule</a>
                    
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="confirm('Confirm Decline')">Decline</button>
                    </form>
    </div>
    
    
@endsection