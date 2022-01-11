<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct(){   // عشان احمي ان مش اي حد يثدر يخش علي الا م يسجل الاول
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('created_at' , 'desc')->get();
        return view('users.index' , compact('users'));
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
         $user = User::create([  // دول اسامي الاعمده
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);
// بعد م كريتنا اليوزر هنكريت بروفايل
        $profile = Profile::create([
            'province' => 'Kirkuk',
            'user_id'  => $user->id,
            'gender'   => 'Male',
            'bio'	   => 'Hello world',
            'facebook' => 'https://www.facebook.com',
        ]);

        return redirect()->route('users.index')->with('success' , 'created successfully');
    }


    public function destroy($id)
    {
            $user = User::find($id);
            $user->profile->delete($id);   // بحذف البروفايل الاول وبعد كدا احذف اليوزر عشان ال oncascade
            $user->delete();
        return redirect()->route('users.index')->with('success' , 'deleted successfully');
    }
}
