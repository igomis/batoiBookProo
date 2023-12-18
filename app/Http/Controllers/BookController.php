<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Mostra la llista de llibres
    public function index()
    {
        $books = Book::paginate(20);
        return view('books.index', compact('books'));
    }

    // Mostra el formulari per a crear un nou llibre
    public function create()
    {
        return view('books.create');
    }

    // Emmagatzema un nou llibre
    public function store(Request $request)
    {
        Book::create($request->all());
        return redirect()->route('books.index');
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
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    // Elimina un llibre específic
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }
}
