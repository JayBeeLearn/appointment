@extends('layout.app')

@section('content')

<div class="container justify-content">
   {{-- The Search bar for locating users  --}}
        <div class="container d-flex justify-content-end">
            <div class=" search ">
                <form action="{{ route('profile') }}" method="GET" role="search">
                    <input type="search" name="search" id="search" class="no-outline " placeholder="Locate a user"> 
                    <button type="submit" class="no-outline "><i class="fa fa-search "></i></button>
                </form>
            </div> 
        </div> 

     <div class="container bg py-2 rounded bg-primary my-2" >
            <h2 class="text-center text-white">
                Locate your friends and business associates
            </h2>
    </div>

    
    <div class="container">
        <table class="table table-bordered table-responsive">
            <tr>
                <th>Username</th>
                <th>Works At</th>
                <th>Gender</th>
            </tr>
            @foreach ($profile as $user)
                <tr>
                    <td>
                        <a href="{{ route('appointment.create', $user->id) }}" class="btn btn-success"> {{ $user->username }}</a>
                    </td>
                    <td>{{ $user->work_place }}</td>
                    <td>{{ $user->gender }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    {{ $profile->links() }}
            
</div>





    
    
@endsection