<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function userList(){
        $title = 'User List';
        $users = User::get();
        return view('admin.userList',compact('title','users'));
    }
    public function userEdit(int $id){
        $title = 'User Update';
        $user = User::findOrFail($id);
        return view('admin.userEdit',compact('title','user'));
    }
    
    public function userUpdate(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string', 'max:30'],
            'role' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',Rule::unique('users')->ignore($request->id)],
        ]);

        $user = User::findOrFail($request->id)->update([
            'name' => $request->name,
            'date' => $request->date,
            'branch_id' => '1',
            'role' => $request->role,
            'email' => $request->email,
        ]);
        return redirect(route('user.list'))->with('status','User Updated Successfully');
    }
    public function userDestroy(int $id){
        $title = 'User List';
        $user = User::findOrFail($id)->delete();
        return redirect(route('user.list'))->with('status','User Deleted Successfully');
    }
}