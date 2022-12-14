<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class ProfileController extends Controller
{
    //Returns all the users profile in the index
    public function index(Request $request)
    {

        $search = $request->search;
        $profile = Profile::where('username', 'LIKE', '%' . $search . '%')->paginate(5);
        // dd($profile);
        return view('profile.index', compact('profile'));
    }

    public function create()
    {
        return view('profile.create');
    }

    public function store(Request $request)
    {

        $profile = new Profile();

        $profile->username = $request->input('username');
        $profile->phone_number = $request->input('phone_number');
        $profile->gender = $request->input('gender');
        $profile->description = $request->input('description');
        $profile->date_of_birth = $request->input('date_of_birth');
        $profile->work_place = $request->input('work_place');
        $profile->user_id = $request->input('user_id');


        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $pictureName = $file->getClientOriginalName();
            $filename = $pictureName . '.' . $extension;
            $file->move('uploads/profilePics/', $filename);
            $profile->profile_photo = $filename;
        } else {
            $profile->profile_photo = '1636758065.jpg';
        }
        // dd($profile);
        $profile->save();

        // $this->validate($request, [
        //     'username',
        //     'phone_number',
        //     'profile_photo',
        //     'gender',
        //     'description',
        //     'date_of_birth',
        //     'work_place',
        //     'user_id'
        // ]);

        // Profile::create($request->all());

        return redirect()->route('appointment.index')->with('message', 'Account and Profile Created Successfully');
    }

    public function show(Profile $profile)
    {
        $user = auth()->user()->id;
        $pro = Profile::where('user_id', $user)->get();
       
        return view('profile.show', compact('pro'));
    }


    public function viewProfile(Profile $profile)
    {
        // $pro = $profile;
        // dd($profile);
        return view('profile.viewprofile', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        // dd($profile);
        return view('profile.edit', compact('profile'));
    }


    public function update(Request $request, Profile $profile)
    {

        // $profile->username = $request->input('username');
        $this->validate($request, [
            'username',
            'phone_number',
            'profile_photo',
            'description',
            'date_of_birth',
            'work_place',
        ]);

        $profil = $profile;
        $profil->username = $request->input('username');
        $profil->phone_number = $request->input('phone_number');
        $profil->gender = $request->input('gender');
        $profil->description = $request->input('description');
        $profil->date_of_birth = $request->input('date_of_birth');
        $profil->work_place = $request->input('work_place');
        $profil->user_id = $request->input('user_id');


        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $extension = $file->getClientOriginalExtension();
            $pictureName = $file->getClientOriginalName();
            $filename = $pictureName . '.' . $extension;
            $file->move('uploads/profilePics/', $filename);
            $profil->profile_photo = $filename;
        }


        $profil->update();

        return redirect()->route('appointment.index')->with('success', 'Profile Updated');
    }
}
