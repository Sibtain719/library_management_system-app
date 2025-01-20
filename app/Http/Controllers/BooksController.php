<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BooksController extends Controller
{
    function add_to_cart($id)
    {
        $book= Books::find($id);
   
        return view('/layout/add_to_cart', compact('book'));

    }
}
