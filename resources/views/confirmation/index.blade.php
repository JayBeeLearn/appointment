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

        <div class="container bg py-2 rounded  my-2" >
            <h2 class="text-center ">
                My Meetings
            </h2>
        </div>
        <div class="container">
            <nav class="nav justify-content-around nav-pills flex-column flex-sm-row ">
                <a href="#previous" data-toggle="tab" class="my-2 nav-link btn btn-warning ">Previous</a>
                <a href="#today" data-toggle="tab" class="my-2 nav-link btn btn-success">Today</a>
                <a href="#upcoming" data-toggle="tab" class="my-2 nav-link btn btn-primary">Upcoming</a>
            </nav>
        </div>

        <div class="tab-content py-5">
            <div class="tab-pane" id="previous">
                <h2>Previous Meeting</h2>
                <div class="container">
                    @if(auth()->check())
                        @if(count($previous_meeting)>0)
                            <div class="container d-flex">
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>Meeting With</th>
                                        <th>Purpose of Meeting</th>
                                        <th>Quick Actions</th>
                                    </tr>
                                    @foreach($previous_meeting as $confirmation)
                                        <tr>
                                            <td>{{ $confirmation->name }}</td>
                                            <td>
                                                <a href="{{ route('confirmation.show', $confirmation->id) }}" class="btn btn-success"> {{ $confirmation->appointment_topic }}</a>
                                            </td>
                                            <td style="">
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
                            {{ $previous_meeting->links() }}
                            @else()
                                <div class="container text-center my-4">
                                    <h3 class=" text-danger"> You Don't have a Meeting </h3>
                                
                                    <a href="{{ route('meeting.create') }}" class="my-4 btn btn-primary ">Create New  Meeting Appointment</a>
                                </div> 
                        @endif
                    @endif
                </div>
            </div>

            <div class="tab-pane active" id="today">
                <h2>Today's Meeting</h2>
                <div class="container">
                    @if(auth()->check())
                        @if(count($today_meeting)>0)
                            <div class="container d-flex">
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>Meeting With</th>
                                        <th>Purpose of Meeting</th>
                                        <th>Quick Actions</th>
                                    </tr>
                                    @foreach($today_meeting as $confirmation)
                                        <tr>
                                            <td>{{ $confirmation->name }}</td>
                                            <td>
                                                <a href="{{ route('confirmation.show', $confirmation->id) }}" class="btn btn-success"> {{ $confirmation->appointment_topic }}</a>
                                            </td>
                                            <td style="">
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
                            {{ $today_meeting->links() }}
                            @else()
                                <div class="container text-center my-4">
                                    <h3 class=" text-danger"> You Don't have a Meeting </h3>
                                
                                    <a href="{{ route('meeting.create') }}" class="my-4 btn btn-primary ">Create New  Meeting Appointment</a>
                                </div> 
                        @endif
                    @endif
                </div>
            </div>

            <div class="tab-pane" id="upcoming">
                <h2>Upcoming Meeting</h2>
                <div class="container">
                    @if(auth()->check())
                        @if(count($upcoming_meeting)>0)
                            <div class="container d-flex">
                                <table class="table table-bordered table-responsive">
                                    <tr>
                                        <th>Meeting With</th>
                                        <th>Purpose of Meeting</th>
                                        <th>Quick Actions</th>
                                    </tr>
                                    @foreach($upcoming_meeting as $confirmation)
                                        <tr>
                                            <td>{{ $confirmation->name }}</td>
                                            <td>
                                                <a href="{{ route('confirmation.show', $confirmation->id) }}" class="btn btn-success"> {{ $confirmation->appointment_topic }}</a>
                                            </td>
                                            <td style="">
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
                            {{ $upcoming_meeting->links() }}
                            @else()
                                <div class="container text-center my-4">
                                    <h3 class=" text-danger"> You Don't have a Meeting </h3>
                                
                                    <a href="{{ route('meeting.create') }}" class="my-4 btn btn-primary ">Create New  Meeting Appointment</a>
                                </div> 
                        @endif
                    @endif
                </div>
            </div>
        </div>
        
    

        
    </div>
    

    
@endsection

  