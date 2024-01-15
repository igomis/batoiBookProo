<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Notifications\BookNewNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(10);
        return new BookCollection($books);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $validatedData = $request->toArray();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/books');
            $validatedData['photo'] = Storage::url($path);
        }
        $validatedData['user_id'] = Auth::user()->id;

        $book = Book::create($validatedData);
        administrador()->notify(new BookNewNotification($book));

        return response()->json(new BookResource($book),200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json(new BookResource($book),200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}
