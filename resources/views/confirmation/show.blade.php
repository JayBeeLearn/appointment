@extends('layout.app')

@section('content')


    <div class="container bg rounded bg-primary py-2">
        <h2 class="text-center text-white">My Appointment with {{ $confirmations->name }}</h2>
    </div>


    <div class="container mx-8">
        <table class="table table-bordered my-4">
            <tr>
                <th>Contact Person</th>
                <td>{{ $confirmations->name }}</td>
            </tr>

            <tr>
                <th>Purpose of Meeting</th>
                <td> <h5>{{ $confirmations->appointment_topic }}</h5></td>
            </tr>

            <tr>
                <th>Details</th>
                <td>{{ $confirmations->appointment_details }}</td>
            </tr>

            <tr>
                <th>Date of Appointment</th>
                <td>{{ $confirmations->date }}</td>
            </tr>

            <tr>
                <th>Time of Appointment</th>
                <td>{{ $confirmations->time }}</td>
            </tr>
        </table>
        

        <form action="{{ route('confirmations.destroy', $confirmations->id) }}" method="POST">
            <div class="container d-flex justify-content-center">
                <div class="container">
                     <a href="{{ route('confirmations.edit', $confirmations->id) }}" class="btn btn-warning"> Reschedule</a>
                </div>
                <div class="container">
                     @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you are done with this meeting?')">Completed!</button>
                </div>
            </div>
        </form>
    </div>
    
    
@endsection