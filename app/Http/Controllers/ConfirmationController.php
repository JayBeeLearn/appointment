<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Confirmations;
use Illuminate\Http\Request;

class ConfirmationController extends Controller
{
    public function index(Confirmations $confirmations){
        $user = auth()->user()->id;
        // dd($user);
        $confirmations = Confirmations::latest()->where('profile_id',  $user)->orWhere('user_id', $user)->paginate('3');

        // dd($confirmations);

        return view('confirmation.index', compact('confirmations'));

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
