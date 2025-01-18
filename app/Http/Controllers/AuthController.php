<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
     //dd($request->email);
    $email = $request->email;
    $password = $request->password;
    //dd($email, $password);
    //dd(User::where('email',$email)->where('password',$password)->where('role','admin')->get());
    $admin= User::where('email',$email)->where('password',$password)->where('role','admin')->first();
    
    if($admin)
    {   
        return redirect('/admin/{id}');
    }
    $student= User::where('email',$email)->where('password',$password)->where('role','student')->first();
    if($student)
    {   $id= $student->id;
        //dd($id);
        return view('layout/students_layout',compact('student'));
    }
    
    $librarian= User::where('email',$email)->where('password',$password)->where('role','librarian')->first();
    if($librarian)
    {   
        return redirect('/librarian_panel');
    }

    }
    // dd($credentials);
        // $user = User::all();
        // $result = User::where('email',$request->email)->where('password', $request->password)->where('role','admin');
        // print_r($result);
        // dd($result);

        // $result = User::where('email', $request->email)->where('role', 'admin')->first();
        // dd($request);
        // if ($result && Hash::check($request->password, $result->password)) {
        //     dd("Authenticated");
        // }
        //dd(User::where('email',$request->email)->where('password',$request->password)->where('role','admin')->get());
        //User::where('email',$request->email)->where('password',$request->password)->where('role','admin')->get()

        // if(User::where('email',$request->input('email'))->where('password',$request->input('password'))->where('role','admin')->get) {
        //     User::find('role','admin');
        // return redirect('/admin');
        // // } 
        // elseif(User::where('email',$request->email)->where(Hash::check('password',$request->password))->where('role','student')) {
        // return redirect('/students');
        // } 


        // if ($user->role === 'admin') {
        //     return redirect()->route('admin'); 
        // } elseif ($user->role === 'student') {
        //     return redirect()->route('/student'); 
        //     return redirect()->route('/librarian_panel'); 
        // }
    

    // return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
}

   