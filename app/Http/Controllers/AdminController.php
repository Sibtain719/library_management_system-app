<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class AdminController extends Controller
{
    function addBooks(Request $request)
    {   //dd('route');
        $books= new Books();
        $books->Title=$request->input('title');
        $books->Author=$request->input('author');
        $books->No_of_copies=$request->input('no_of_copies');
        $books->Category=$request->input('category');
        $books->Published_date=$request->input('published_date');
        $books->Availibility=$request->input('availability');
        $books->Borrowed_by=$request->input('borrowed_by');
       // $books= Books::create('Actions'->$request->input('title'));
       //dd($books);
       $books->save();
       return redirect('/books');
        


    }

    function addMembers(Request $request)
    {

    }

    function deleteBooks(Request $request)
    {

    }
    function editBooks(Request $request)
    {

    }


    function deleteMembers(Request $request)
    {

    }

    function transactions(Request $request)
    {

    }

    function addNewTransaction(Request $request)
    {

    }

    function deleteTransactions(Request $request)
    {

    }

    function editTransactions(Request $request)
    {

    }

    function viewReports(Request $request)
    {

    }

    function generateRreports(Request $request)
    {

    }
}
