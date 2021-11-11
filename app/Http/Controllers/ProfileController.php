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
    public function index(Request $request){

        $search = $request->search;
        $profile = Profile::where('username', 'LIKE', '%' . $search . '%')->paginate(5);
        // dd($profile);
        return view('profile.index', compact('profile'));
    }

    public function create(){
        return view('profile.create');
    }

    public function store(Request $request){

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
            $filename = time() . '.' . $extension;
            $file->move('uploads/profilePics/', $filename);
            $profile->profile_photo = $filename;
        } else {
            return 
            $profile->profile_photo = '';
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

    public function show(Profile $profile){
        // $pro = Profile::get('id');
        
        // $uID = User::get('id')->where('id', $pro);
        // // dd($uID);
        // $user = User::find($uID);
        // // dd($user);

        $user = auth()->user()->id;
        $pro = Profile::where('user_id', $user)->get();
        // $prof = $pro->username;

        // dd($pro);
   
        return view('profile.show', compact('pro'));
    }


    public function viewProfile(Profile $profile){
        // $pro = $profile;
        // dd($profile);
        return view('profile.viewprofile', compact('profile'));
    }

    public function edit(Profile $profile){
        return view('profile.edit', compact('profile'));
    }


    public function update(Request $request, Profile $profile){

       


        $profile->username = $request->input('username');
        $this->validate($request, [
            'username',
            'phone_number',
            'profile_photo',
            'description',
            'date_of_birth',
            'work_place',
        ]);

        // dd($request);

        $profile->update($request->all());

        return redirect()->route('appointment.index')->with('success', 'Profile Updated');

    }
}
