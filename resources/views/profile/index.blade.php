@extends('layout.app')

@section('content')

<div class="container justify-content">
  @include('include.search')

     <div type="submit" class="" >
         <a href="#search" class="btn btn-primary"> 
             <h2 class="text-center text-white">
                Locate your friends and business associates
            </h2>
        </a>
            
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
                        <a href="{{ route('viewProfile', $user->id) }}" class="btn btn-success"> {{ $user->username }}</a>

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