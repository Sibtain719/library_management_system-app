<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;
use App\Models\Librarian;
use App\Models\User;
use App\Models\Students;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
  

    function addMember(Request $request)
    {
        // $librarian= new Librarian();
        // $librarian->Username= $request->input('name');
        // $librarian->Email= $request->input('email');
        // $librarian->Password= $request->input('password');

        // $librarian->save();
        //dd($request->role);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'role' => $request->role, 
        ]);

        // if($request->role=='librarian')
        // {
        //     Librarian::create([
        //         'Username' => $request->name,
        //         'Email' => $request->email,
        //         'Password' => Hash::make($request->password),
               
        //     ]);
        // }
        // if($request->role=='student')
        // {
        //     Students::create([
        //         'Name' => $request->name,
        //         'Email' => $request->email,
        //         'Password' => Hash::make($request->password),
               
        //     ]);
        // }
     

        return redirect('/members');
    }


    function delete_member(Request $request,$id)
    {
        User::find($id);
        User::destroy($id);
        return redirect('/members');
       

    }

    function update_member(Request $request,$id)
    {

        User::where('id',$id)->update($request->all());
        return redirect('/members');
       
    }


}
