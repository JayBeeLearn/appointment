<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use App\Models\Appointment;
use App\Models\Confirmations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $profile = Appointment::latest('profile_id')->where('profile_id', '!=', $user)->first();

        // dd($profile->id);

        // $appointments = DB::table('appointments')->select(array('user_id', 'profile_id'))->where('user_id'||'profile_id',  $user)->get();
        // $appointments = DB::table('appointments')->select(array('user_id', 'profile_id'),  $user)->get();>
        // $appointments = DB::table('appointments')->where('user_id', '='  $user)->get();

        $user = auth()->user()->id;
        $appointments = Appointment::latest()->where('profile_id',  $user)->orWhere('user_id', $user)->paginate('3');
        // $apptime = $appointments->time;


        // $apptim = time('h:i:s a m/d/y', strtotime($apptime));

        // dd);


        // $appointments = $appointment->paginate(3);

        // dd($appointments);
        // $userId = auth()->user()->id;
        // $profile = Profile::with('user')->where('user_id', '!=', $userId)->get('id');




        // $appointments = Appointment::where('user_id',  $user)->get();
        // $appointments = Appointment::where('profile_id',  $user)->get();

        
        // $appointments = Appointment::latest()->paginate(3);
        return view('appointment.index', compact(['appointments', 'profile']))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Profile $profile)
    {
        $pru = $profile->user->name;
        // dd($pru);
        
        // dd($profi->id);
        
        // $user_id = User::get('id');
        // dd($user_id);
        // $profile = Profile::with('user')->get('id')->pluck('id')->all();

        // dd($userProfile);

        return view('appointment.create', compact(['profile', 'pru']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('great');
        $this->validate($request, [
            'user_id',
            'profile_id',
            'name',
            'appointment_topic',
            'appointment_details',
            'date',
            'time'
            
        ]);


        // dd($request);
        Appointment::create($request->all());



        return redirect()->route('appointment.index')->with('success', 'Appointment Successfully Booked');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment, Profile $profile)
    {
        // dd($profile);
        return view('appointment.show', compact(['appointment', 'profile']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        return view('appointment.edit', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        $this->validate($request, [
            'name' => 'required',
            'appointment_topic' => 'required',
            'appointment_details' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);


        // dd($request);
        $appointment->update($request->all());



        return redirect()->route('appointment.index')->with('success', 'Appointment rescheduled successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        // dd('deleted');

        return redirect()->route('appointment.index')->with('success', 'Appointment has been declined');
    }




    public function percreate()
    {
        // $user_id = User::get('id');
        // dd($user_id);
        // $profile = Profile::with('user')->get('id')->pluck('id')->all();

        // dd($profile);

        return view('appointment.personalcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function perstore(Request $request)
    {
        // dd('great');
        $this->validate($request, [
            'user_id',
            'name',
            'appointment_topic',
            'appointment_details',
            'date',
            'time'

        ]);


        // dd($request);
        Appointment::create($request->all());



        return redirect()->route('appointment.index')->with('success', 'Appointment Successfully Booked');
    }

}
