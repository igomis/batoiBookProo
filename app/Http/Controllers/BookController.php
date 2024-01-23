<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Http\Services\AlertService;
use App\Http\Services\ChatGTPService;
use App\Mail\PurchaseConfirmationMail;
use App\Models\Book;
use App\Models\Sale;
use App\Notifications\BookNewNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
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
        administrador()->notify(new BookNewNotification($book));
        AlertService::info('Llibre creat correctament');


        // Redirigeix o retorna una resposta segons siga necessari
        return redirect()->route('books.show', $book->id);
    }

    public function admetre(Book $book)
    {
        $book->admes = true;
        $book->save();
        return redirect()->route('books.show', $book->id);
    }

    public function sale(Book $book)
    {
        $book->soldDate = now()->format('Y-m-d');
        $book->save();
        $sale = new Sale([
            'book_id' => $book->id,
            'user_id' => Auth::user()->id,
            'date' => $book->soldDate,
            'status' => 1
        ]);
        $sale->save();
        $venedor = $book->User;
        Mail::to($venedor->email)->send(new PurchaseConfirmationMail($sale));

        return redirect()->route('books.show', $book->id);
    }

    // Mostra un llibre específic
    public function show(Book $book)
    {
        $response = new ChatGTPService();
        $reply = $response->response("Fes un index d'un llibre de Formació Professional amb títol: ".
            $book->Module->vliteral);
        $message = '';
        foreach ($reply as $r){
            if ($r['message']['role'] == 'assistant') {
                $message .= $r['message']['content'];
            }
        }
        return view('books.show', compact('book','message'));
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
        AlertService::info('Llibre actualitzat correctament');
        return redirect()->route('books.show', $book->id);

    }

    // Elimina un llibre específic
    public function destroy(Book $book)
    {
        $book->delete();
        AlertService::warning('Llibre eliminat correctament');
        return redirect()->route('books.index');
    }
}
