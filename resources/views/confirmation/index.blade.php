@extends('layout.app')

@section('content')
    <div class="container">
        {{-- The Search bar for locating users  --}}
        <div class="container d-flex justify-content-end">
            <div class=" search ">
                <form action="{{ route('profile') }}" method="GET" role="search">
                    <input type="search" name="search" id="myTextField" class="no-outline " placeholder="Locate a user"> 
                    <button type="submit" class="inline "><i class="fa fa-search"></i></button>
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
                Confirmed Meetings
            </h2>
        </div>

         <div class="container" >
            <div class="container d-flex pull-right justify-content-end my-1">
                <form action="{{ route('meeting.create') }}">
                    @csrf
                    <button class="btn btn-info" type="submit">Add New Meeting</button>
                </form>
            </div>
        </div>
        @if(auth()->check())
            @if(count($confirmations)>0)
            <div class="container">
                <table class="table table-bordered">
                    <tr>
                        <th>Meeting With</th>
                        <th>Purpose of Meeting</th>
                        <th>Quick Actions</th>
                    </tr>
                    @foreach($confirmations as $confirmation)
                        <tr>
                            <td>{{ $confirmation->name }}</td>
                            <td>
                                <a href="{{ route('confirmation.show', $confirmation->id) }}" class="btn btn-success"> {{ $confirmation->appointment_topic }}</a>
                            </td>
                            <td style="width:360px">
                                <form action="{{ route('confirmations.destroy', $confirmation->id) }}" method="POST">
                                    
                                    <a href="{{ route('confirmations.edit', $confirmation->id) }}" class="btn btn-warning my-1"> Reschedule</a>
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you are done with this meeting?')">Completed!</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
                
            @else()
                <h3 class="text-center text-danger"> You Don't have a Meeting </h3>
                <div class="container text-center">
                    <a href="{{ route('meeting.create') }}" class="btn btn-primary ">Create New  Meeting Appointment</a>
                </div> 
            @endif
        @endif

        
    </div>
    {{ $confirmations->links() }}
@endsection