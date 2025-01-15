<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{

    function addAuthor(Request $request)
    {   //dd('route');
        $author= new Author();
        $author->Author_Name=$request->input('author_name');
       //dd($author);
       $author->save();
       return redirect('/author_names');
    
    }

    function delete_author(Request $request,$id)
    {
        Author::find($id);
        Author::destroy($id);
        return redirect('/author_names');
       

    }

    function update_author(Request $request,$id)
    {

        Author::where('id',$id)->update($request->all());
        return redirect('/author_names');
       
    }
    
}
