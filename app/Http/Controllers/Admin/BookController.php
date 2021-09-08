<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use http\Message;
use Illuminate\Http\Request;

class BookController extends Controller
{
    //
    public function index()
    {
        $data = Book::with('books')->get();
        $message = 'show all books';
        $status = 'success';
        return response()->json(compact(['data','message','status']),200);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate(
            [
                'title' => 'required|string|min:3',
                'parent_id' => 'required|string|exists:books,id'
            ]
        );

       $book = Book::create($attributes);
       $data = $book;
       $message = 'book create success';
       $status = 'success';
       return response()->json(compact(['data','message','status']),201);
    }
}
