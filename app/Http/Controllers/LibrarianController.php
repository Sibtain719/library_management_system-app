<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class LibrarianController extends Controller
{
    function addBooks(Request $request)
    {   //dd('route');

        //dd($request->input('category'));
        $books= new Books();
        $books->Title=$request->input('title');
        $books->author_id=$request->input('author');
        $books->No_of_copies=$request->input('no_of_copies');
        $books->category_id=$request->input('category');
        $books->Published_date=$request->input('published_date');
        $books->Availibility=$request->input('availability');
        $books->Borrowed_by=$request->input('borrowed_by');
       // $books= Books::create('Actions'->$request->input('title'));
       //dd($books);
       $books->save();
       return redirect('/books');
    
    }


    function delete_books($id)
    {
        //dd($id);
        Books::find($id);
        Books::destroy($id);
        return redirect('/books');
       
    }

    function update_books(Request $request,$id)
    {
        // dd($id);
        //echo $data;
        Books::where('id',$id)->update($request->all());
        
        //BookCategory::Update($id);
        return redirect()->back()->with('success', 'Category Updated successfully.');
       
    }

    
}
