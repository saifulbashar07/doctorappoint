<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicineController extends Controller
{
    public function create()
    {
        $title = 'Add Medicine';
        return view('medicine.create',compact('title'));
    }

    public function store(Request $request)
    {
         
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'group' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:30'],
        ]);

        $Medicine = Medicine::create([
            'name' => $request->name,
            'description' => $request->description,
            'group' => $request->group,
            'date' => $request->date,
            'branch_id' => Auth::user()->branch_id,
            'user_id' => Auth::user()->id
            
        ]);
       

        return redirect(route('medicine.create'))->with('status','Medicine Info Added Successfully');
    }
    public function list(){
        $title = 'Medicine List';
        $medicines = Medicine::get();
        return view('medicine.list',compact('title','medicines'));
    }

    public function edit(int $id){
        $title = 'Medicine Update';
        $medicine = Medicine::findOrFail($id);
        return view('medicine.edit',compact('title','medicine'));
    }
    
    public function update(Request $request){
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'group' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:30'],
        ]);

        $Medicine = Medicine::findOrFail($request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'group' => $request->group,
            'date' => $request->date,
            'branch_id' => Auth::user()->branch_id,
            'user_id' => Auth::user()->id
        ]);
       

       
        return redirect(route('medicine.list'))->with('status','Medicine Info Updated Successfully');
    }
    public function destroy(int $id){
        //$title = 'Medicine List';
        $user = Medicine::findOrFail($id)->delete();

        return redirect(route('medicine.list'))->with('status','Medicine Info Deleted Successfully');
    }
    
}