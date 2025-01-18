<?php
namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Books;

class StudentController extends Controller
{
    public function register(Request $request)
    {
        //dd('sfas');
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|unique:students',
        //     'password' => 'required|min:8',
        // ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' =>$request->password,
            'role' =>'student',
        ]);

        // Students::create([
        //     'Name' => $request->name,
        //     'Email' => $request->email,
        //     'Password' => Hash::make($request->password),
            
        // ]);

        return redirect('/login')->with('success', 'Registration successful. Please log in.');
    }

    function addcart($id)
    {
        $book= Books::find($id);
        $book->decrement('No_of_copies',1);

        return redirect('/explore_books');
    }
}
