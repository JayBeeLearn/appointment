@extends('layout.app')

@section('content')
    <div class="container">
        @include('include.search')
   
        <div class="container mt-2">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
        </div>
       

        <div class="container bg py-2 rounded bg-primary my-2" >
            <h2 class="text-center text-white">
                My Appointments
            </h2>
        </div>
       
        @if(auth()->check())
            @if(count($appointments)>0)
               
                     @foreach($appointments as $appointment)
                         
                <div class="container user rounded my-4 p-4">
                    <div class="container text-center">
                            @if (auth()->user()->id === $appointment->profile_id)
                                <small>Appointment With</small>
                                <h4>{{ $appointment->user->name }} <small class="small"> on {{ $appointment->date }}</small class="small"></h4> 
                            @else()
                                <small>Appointment With</small>
                                <h4>{{ $appointment->name }} <small class="small"> on {{ $appointment->date }}</small class="small"></h4> 

                            @endif
                            
                           <a href="{{ route('appointment.show', $appointment->id) }}" class="my-1"> <h4> {{ $appointment->appointment_topic }}</h4> </a>
                            <small> Being Purpose of Appointment</small>
                    </div>
                    <div class=" text-center my-2">
                        <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST">

                            @if (auth()->user()->id === $appointment->profile_id)
                                    <a href="{{ route('confirm', $appointment->id) }}" class="btn btn-primary" onclick="return confirm('Sure you want to confirm meeting?')"> Confirm</a>
                                     <a href="{{ route('appointment.edit', $appointment->id) }}" class="btn btn-warning my-1"> Reschedule</a>
                            
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm Decline')">Decline</button>
                                     
                            @else()
                            
                                <a href="{{ route('appointment.edit', $appointment->id) }}" class="btn btn-warning my-1"> Reschedule</a>
                            
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm Decline')">Delete</button>
                            
                            @endif
                               
                        </form>
                    </div>
                </div>

                    @endforeach
                
                   
            @else()
                <h3 class="text-center text-danger"> You Don't have an appointment </h3>
                <div class="container text-center">
                    <a href="{{ route('meeting.create') }}" class="btn btn-primary my-2">Create New  Meeting Appointment </a>
                    <span class="mx-4">OR</span>
                    
                    <a href="{{ route('appointment.confirm') }}" class="btn btn-success my-2">Check Confirm Meetings</a>


                </div> 

                <div class="d-flex justify-content-center">
                    <a href="#search" class="btn btn-primary my-4 mx-4 p-3 rounded text-white">
                            <h3>Locate a Client or Business and Book for an Appointment </h3>
                    </a>
                </div>
            @endif
        @endif

        
    </div>
    {{ $appointments->links() }}
@endsection