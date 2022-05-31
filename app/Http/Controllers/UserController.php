<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    public function profile(){
        $user_profile = User::where('email', auth()->user()->email)->first();

        return view('auth0.user.profile.profile', [
            'add_user_info' => $user_profile,
        ]);
    }

    public function view_users(){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];

        $userList = User::get();

        if($user_role == "admin"){
            return view('auth0.admin.users.list', [
            'users' => $userList,
            ]);
        } else
            return redirect('/user')->back()->with('status', "You're not permitted");
    }

    public function delete_user($id){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];

        if($user_role === "admin"){
            $delete = User::where('id', $id)->delete();

            if($delete)
                return redirect()->back()->with('status', "User successfully banned!");

        } else 
            return redirect('/user')->back()->with('status', "You're not permitted");
    }


    public function edit_user(Request $request, $email){
        $roles_url = "http://frozen-island-51326.herokuapp.com/roles";
        $user_role = auth()->user()->$roles_url[0];

        $this->validate($request, [
            'contact' => 'required',
            'address' => 'required',
        ]);

        $edit = User::where('email', $email)->update([
            'contact' => $request->contact,
            'address' => $request->address
        ]);

        if($edit)
            return redirect()->back()->with('status', "User update is successful!");
        else 
            return redirect('/user')->back()->with('status', "You're not permitted");
        
    }

}
