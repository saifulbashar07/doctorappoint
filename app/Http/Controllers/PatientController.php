<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DoctorFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;


class PatientController extends Controller
{
    public function appointment(){
        $title = 'Patient Appoinment';
        return view('patient.appointment',compact('title'));
    }
    public function store(Request $request)
    {
         
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:255'],
            'age' => ['required', 'string', 'max:30'],
            'timing' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $patient = Patient::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'date' => $request->date,
            'timing' => $request->timing,
            'age' => $request->age,
            'branch_id' => 1,
            'role' => 'Patient',
            'user_id' => 0,
            'email' => $request->email,
            'description' => $request->description,
            'password' => Hash::make($request->password),
        ]);
       $patient_id = $patient->id;
       if($patient_id):
            $user = User::create([
                'name' => $request->name,
                'date' => $request->date,
                'branch_id' => 1,
                'patient_id' => $patient_id,
                'role' => 'Patient',
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        endif;

        return redirect(route('patient.appointment'))->with('status','Appointment Info Added Successfully');
    }
    public function list(){
        $title = 'Patient List';
        $patients = Patient::get();
        return view('patient.list',compact('title','patients'));
    }

    public function edit(int $id){
        $title = 'Patient Update';
        $patient = Patient::findOrFail($id);
        return view('Patient.edit',compact('title','patient'));
    }
    
    public function update(Request $request){
        
        $patient_id = $request->id;

        $email_check = User::where('email', $request->email)->where('patient_id', '!=', $patient_id )->get()->count();

        // print_r($email_check);exit;
        if($email_check != 0){
            return redirect(url('/Patient/'.$patient_id.'/edit'))->with('status','This email already used by another user');
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:255'],
            'speciality' => ['required', 'string', 'max:255'],
            'timing' => ['required', 'string', 'max:255'],
            'patient_per_day' => ['required', 'string', 'max:30'],
            'date' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',Rule::unique('Patients')->ignore($request->id)],
        ]);

        $patient = Patient::findOrFail($request->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'date' => $request->date,
            'timing' => $request->timing,
            'speciality' => $request->speciality,
            'patient_per_day' => $request->patient_per_day,
            'branch_id' => Auth::user()->branch_id,
            'user_id' => Auth::user()->id,
            'email' => $request->email,
            'description' => $request->description,
        ]);
       

        $user = User::where('Patient_id',$request->id)->update([
            'name' => $request->name,
            'date' => $request->date,
            'branch_id' => Auth::user()->branch_id,
            'Patient_id' => $patient_id,
            'email' => $request->email,
        ]);
        return redirect(route('Patient.list'))->with('status','Patient Info Updated Successfully');
    }
    public function destroy(int $id){
        //$title = 'Patient List';
        $user = Patient::findOrFail($id)->delete();
        $user = User::where('patient_id',$id)->delete();

        return redirect(route('patient.list'))->with('status','Patient Info Deleted Successfully');
    }

    public function uploadDocument(){
        $title = 'Patient Document';
        return view('patient.documentUpload',compact('title'));
    }
    public function prescription(){
        $title = 'Patient Prescription';        
        $file = DoctorFile::where('patient_id',Auth::user()->patient_id)->orderBy('id', 'desc')->first();
        return view('patient.prescription',compact('title','file'));
    }


}