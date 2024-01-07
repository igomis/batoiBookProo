<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomePage extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $books = Book::paginate(10);
        return view('welcome', compact('books'));
    }
}
