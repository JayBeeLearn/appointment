@extends('layout.app')

@section('content')
    <div class="container bg rounded bg-primary py-2 mx-4">
        <h2 class="text-center text-white">
            Edit Profile
        </h2>
    </div>
    <div class="container ">
        <div class=" p-2">
            <form action="{{ route('profile.update', $profile->id) }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="username" value="{{ auth()->user()->username }}">


                <div class="form-group py-2">
                    <label for="name">Description</label>
                    <textarea name="description" placeholder="Enter Bio" class="form-control" >{{ $profile->description }}</textarea>
                    
                </div>

                 <div class="form-group py-2">
                    <label for="date">Date of Birth</label>
                    <input type="date" name="date_of_birth" placeholder="01-01-1980" class="form-control" value="{{ $profile->date_of_birth }}">
                </div>

                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="form-group py-2">
                    <label for="work_place">Place of Work</label>
                    <input type="text" name="work_place" placeholder="International Airport" class="form-control" value="{{ $profile->work_place }}">
                </div>

                <div class="form-group py-2">
                    <label for="phone_number">Phone Number</label>
                    <input type="tel" name="phone_number" placeholder="+000 000 000 000" class="form-control" value="{{ $profile->phone_number }}">
                </div>
                
                 <div class="container dflex d-flex form-group py-2">
                     <div class="">
                        <label for="profile_photo">Profile Photo</label>
                        <input class="file-upload-input" onchange="previewImage();" accept="image/*" type="file" name="profile_photo" id="profile_photo" value="{{ $profile->profile_photo }}">
                     </div>
                     
                     <div class="container py-2">
                        <img id="preview" src="" alt="" width="155" height="155">
                    </div>
                </div>
        
                <div class="container text-center py-2 justify-content-around">
                        <button type="submit" class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>

            
        </div>
    </div>
@endsection