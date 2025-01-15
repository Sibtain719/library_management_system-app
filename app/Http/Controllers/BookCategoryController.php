<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookCategory;

class BookCategoryController extends Controller
{
    function addBookCategory(Request $request)
    {   //dd('route');
        $category= new BookCategory();
        $category->Category=$request->input('category');
       //dd($category);
       $category->save();
       return redirect()->back()->with('success', 'Category added successfully.');
        
    }


    function delete_category($id)
    {
        BookCategory::find($id);
        BookCategory::destroy($id);
        return redirect('/book_category');
       
    }


    function update_category(Request $request,$id)
    {
        //dd($id);
        BookCategory::where('id',$id)->update($request->all());
        
        //BookCategory::Update($id);
        return redirect()->back()->with('success', 'Category Updated successfully.');
       
    }
}
