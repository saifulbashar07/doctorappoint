<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Patient;
use App\Models\DoctorFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
{
    public function create()
    {
        $title = 'Add Doctor';
        return view('doctor.create',compact('title'));
    }

    public function store(Request $request)
    {
         
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:255'],
            'speciality' => ['required', 'string', 'max:255'],
            'timing' => ['required', 'string', 'max:255'],
            'patient_per_day' => ['required', 'string', 'max:30'],
            'date' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $doctor = Doctor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'date' => $request->date,
            'timing' => $request->timing,
            'speciality' => $request->speciality,
            'patient_per_day' => $request->patient_per_day,
            'branch_id' => Auth::user()->branch_id,
            'role' => 'Doctor',
            'user_id' => Auth::user()->id,
            'email' => $request->email,
            'description' => $request->description,
            'password' => Hash::make($request->password),
        ]);
       $doctor_id = $doctor->id;
       if($doctor_id):
            $user = User::create([
                'name' => $request->name,
                'date' => $request->date,
                'branch_id' => Auth::user()->branch_id,
                'doctor_id' => $doctor_id,
                'role' => 'Doctor',
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        endif;

        return redirect(route('doctor.create'))->with('status','Doctor Info Added Successfully');
    }
    public function list(){
        $title = 'Doctor List';
        $doctors = Doctor::get();
        return view('doctor.list',compact('title','doctors'));
    }

    public function edit(int $id){
        $title = 'Doctor Update';
        $doctor = Doctor::findOrFail($id);
        return view('doctor.edit',compact('title','doctor'));
    }
    
    public function update(Request $request){
        
        $doctor_id = $request->id;

        $email_check = User::where('email', $request->email)->where('doctor_id', '!=', $doctor_id )->get()->count();

        // print_r($email_check);exit;
        if($email_check != 0){
            return redirect(url('/doctor/'.$doctor_id.'/edit'))->with('status','This email already used by another user');
        }
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['required', 'string', 'max:255'],
            'speciality' => ['required', 'string', 'max:255'],
            'timing' => ['required', 'string', 'max:255'],
            'patient_per_day' => ['required', 'string', 'max:30'],
            'date' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',Rule::unique('doctors')->ignore($request->id)],
        ]);

        $doctor = Doctor::findOrFail($request->id)->update([
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
       

        $user = User::where('doctor_id',$request->id)->update([
            'name' => $request->name,
            'date' => $request->date,
            'branch_id' => Auth::user()->branch_id,
            'doctor_id' => $doctor_id,
            'email' => $request->email,
        ]);
        return redirect(route('doctor.list'))->with('status','Doctor Info Updated Successfully');
    }
    public function destroy(int $id){
        //$title = 'Doctor List';
        $user = Doctor::findOrFail($id)->delete();
        $user = User::where('doctor_id',$id)->delete();

        return redirect(route('doctor.list'))->with('status','Doctor Info Deleted Successfully');
    }
    public function profile(int $id){
        $title = 'Doctor Profile';
        
        $doctor = Doctor::findOrFail($id);
        return view('doctor.profile',compact('title','doctor'));
    }
    public function uploadDocument(){
        $title = 'Document Upload';
        $files = DoctorFile::get();
        $patients = Patient::get();
        return view('doctor.documentUpload',compact('title','files','patients'));
    }

    public function storeDocument(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,png,jpeg|max:2048',
            'patient_id' => 'required',
            'date' => 'required'
            
        ]);
        
        $folder = 'doctor';
    
        if($request->file()) {
            $file_path = uploadDocument($folder,$request);

            $doctor = DoctorFile::create([
                'patient_id' => $request->patient_id,
                'doctor_id' => Auth::user()->doctor_id,
                'date' => $request->date,
                'file' => $folder .'/'. $file_path,
                'branch_id' => Auth::user()->branch_id,
                'user_id' => Auth::user()->id
            ]);       
        return redirect(route('doctor.document'))->with('status','Document Uploaded Successfully'); 
       
       
        }
    }
    public function documentEdit(int $id){
        $title = 'Doctor Update';
        $doctorFile = DoctorFile::findOrFail($id);       
        $patients = Patient::get();
        return view('doctor.documentEdit',compact('title','doctorFile','patients'));
    }
    
    public function documentUpdate(Request $request){
        
        $request->validate([
            'file' => 'required|mimes:jpg,png,jpeg|max:2048',
            'patient_id' => 'required',
            'date' => 'required'
            
        ]);
        
        $folder = 'doctor';
    
        if($request->file()) {
            $image_path = DoctorFile::findOrFail($request->id)->file;
            unlink($image_path);

        $file_path = uploadDocument($folder,$request);

        $file = DoctorFile::findOrFail($request->id)->update([
            'patient_id' => $request->patient_id,
            'doctor_id' => Auth::user()->doctor_id,
            'date' => $request->date,
            'file' => $folder .'/'. $file_path,
            'branch_id' => Auth::user()->branch_id,
            'user_id' => Auth::user()->id
        ]);
        return redirect(route('doctor.document'))->with('status','Document Updated Successfully');
        }
    }
    public function documentDestroy(int $id){
        //$title = 'Doctor List';
        $image_path = DoctorFile::findOrFail($id)->file;
        unlink($image_path);
        $file = DoctorFile::findOrFail($id)->delete();

        return redirect(route('doctor.document'))->with('status','Document Info Deleted Successfully');
    }
}