<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Confirmations;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index(Confirmations $confirmations){
        $tday = Carbon::now();

        $today = $tday->toDateString();
        $user = auth()->user()->id;
        // dd($user);
        $today_meeting = Confirmations::latest()->where('profile_id',  $user)->orWhere('user_id', $user)->where('date', '=', $today)->paginate('20');

        $previous_meeting = Confirmations::latest()->where('profile_id',  $user)->orWhere('user_id', $user)->where('date', '<', $today)->paginate('20');

        $upcoming_meeting = Confirmations::latest()->where('profile_id',  $user)->orWhere('user_id', $user)->where('date', '>', $today)->paginate('20');

        
        // dd($today_meeting);
        // dd($today);

        // dd($confirmations);

        return view('confirmation.index', compact(['today_meeting', 'previous_meeting', 'upcoming_meeting']));

    }

    public function show(Confirmations $confirmations){
        
        return view('confirmation.show', compact('confirmations'));
    }

    public function edit(Confirmations $confirmations){
        return view('confirmation.edit', compact('confirmations'));
    }

    public function update(Confirmations $confirmations, Request $request){
        $oldAppoint = $confirmations;

        $this->validate($request, [
            'name' => 'required',
            'appointment_topic' => 'required',
            'appointment_details' => 'required',
            'date' => 'required',
            'time' => 'required'
        ]);

        $oldAppoint->update($request->all());

        return redirect()->route('appointment.confirm');
        
    }


    public function confirm(Appointment $appointment, Request $request){

        // $user = auth()->user()->id;
        // $appointments = Appointment::latest()->where('profile_id',  $user)->get();

        $appoint = $appointment;
        // dd($appoint->id);

        $confirmApp = $appoint->replicate();
        $confirmApp->setTable('confirmations');
        $confirmApp->save();

        $appoint->delete();
        // dd($confirmApp);

        return \redirect()->route('appointment.index');
        
    }

    public function meeting_create(){
        return view('confirmation.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'user_id',
            'profile_id',
            'name',
            'appointment_topic',
            'appointment_details',
            'date',
            'time'
        ]);

        Confirmations::create($request->all());

        
        return redirect()->route('appointment.confirm');
        // dd('Sucessful');
    }


    public function destroy(Confirmations $confirmations){
        $confirmation = $confirmations;
        // dd($confirmation);
        $confirmation->delete();

        return redirect()->route('appointment.confirm');
    }
}
