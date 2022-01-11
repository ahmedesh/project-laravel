<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use App\Profile;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function __construct(){   // عشان احمي ان مش اي حد يقدر يخش علي الا م يسجل الاول
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
//        $id = Auth::id();
        if ($user->profile === null) {   // profile دا اسم الفانكشن اللي فال User.php
            $profile = Profile::create([
                'province' => 'Kirkuk',
                'user_id'  => $user->id,
                'gender'   => 'Male',
                'bio'	   => 'Hello world',
                'facebook' => 'https://www.facebook.com',
            ]);
            return redirect()->route('profile.index');  // بعد م نكريت روح اعرضه
        }

        return view('users.profile')->with('users',$user);  // ال users دي اللي هستخدمها فال profile.blade.php

    }

    public function update(Request $request )
    {
        $this->validate($request,[
            'name'     => 'required',
            'province' => 'required',
            'gender'   => 'required',
            'bio'	   => 'required',
            'facebook' => 'required',
        ]);

//        $user = User::all();  == $user = Auth::user();
        $user = Auth::user();
        $user->name = $request->name ;
        $user->profile->province = $request->province ;  // profile دا اسم الفانكشن اللي فال User.php
        $user->profile->facebook = $request->facebook ;  // profile دا اسم الفانكشن اللي فال User.php
        $user->profile->gender   = $request->gender ;      // profile دا اسم الفانكشن اللي فال User.php
        $user->profile->bio      = $request->bio ;            // profile دا اسم الفانكشن اللي فال User.php
        $user->save();
        $user->profile->save();

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
            $user->save();
        }

        return redirect()->back()->with( 'success' , 'updated successfully' );

    }
}
