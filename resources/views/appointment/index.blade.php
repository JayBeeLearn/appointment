@extends('layout.app')

@section('content')
    <div class="container">
        {{-- The Search bar for locating users  --}}
        <div class="container d-flex justify-content-end">
            <div class=" search ">
                <form action="{{ route('profile') }}" method="GET" role="search">
                    <input type="search" name="search" id="search" class="no-outline " placeholder="Locate a user"> 
                    <button type="submit" class=" "><i class="fa fa-search "></i></button>
                </form>
            </div> 
        </div>   

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
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>Appointment With</th>
                        <th>Purpose of Appointment</th>
                        <th>Quick Actions</th>
                    </tr>
                    @foreach($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->name }}</td>
                            <td>
                                <a href="{{ route('appointment.show', $appointment->id) }}" class="btn btn-success"> {{ $appointment->appointment_topic }}</a>
                            </td>
                            <td style="">
                                <form action="{{ route('appointment.destroy', $appointment->id) }}" method="POST">
                                    {{-- @if (auth()->user()->id = $profile) --}}

                                        <a href="{{ route('confirm', $appointment->id) }}" class="btn btn-primary" onclick="return confirm('Sure you want to confirm meeting?')"> Confirm</a>
                                    {{-- @else() --}}
                                        <a href="{{ route('appointment.edit', $appointment->id) }}" class="btn btn-warning my-1"> Reschedule</a>
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Confirm Decline')">Decline</button>
                                    {{-- @endif --}}
                                    
                                    
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @else()
                <h3 class="text-center text-danger"> You Don't have an appointment </h3>
                <div class="container text-center">
                    <a href="{{ route('meeting.create') }}" class="btn btn-primary ">Create New  Meeting Appointment </a>
                    <span class="mx-4">OR</span>
                    
                    <a href="{{ route('appointment.confirm') }}" class="btn btn-success ">Check Confirm Meetings</a>


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