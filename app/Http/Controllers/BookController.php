<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // Mostra la llista de llibres
    public function index()
    {
        $books = Auth::user()->administrador? Book::paginate(20) : Book::where('user_id', Auth::user()->id)->paginate(20);
        return view('books.index', compact('books'));
    }

    // Mostra el formulari per a crear un nou llibre
    public function create()
    {
        return view('books.create');
    }

    // Emmagatzema un nou llibre
    public function store(BookRequest $request)
    {
        $validatedData = $request->toArray();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/books');
            $validatedData['photo'] = Storage::url($path);
        }
        $validatedData['user_id'] = Auth::user()->id;

        $book = Book::create($validatedData);

        // Redirigeix o retorna una resposta segons siga necessari
        return redirect()->route('books.show', $book->id);
    }

    // Mostra un llibre específic
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    // Mostra el formulari d'edició per a un llibre específic
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Actualitza un llibre específic
    public function update(BookRequest $request, Book $book)
    {
        $validatedData = $request->toArray();

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('public/books');
            $validatedData['photo'] = Storage::url($path);
        }

        // Redirigeix o retorna una resposta segons siga necessari
        $book->update($validatedData);
        return redirect()->route('books.show', $book->id);

    }

    // Elimina un llibre específic
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
