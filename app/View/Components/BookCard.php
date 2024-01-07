<?php

namespace App\View\Components;

use App\Models\Book;
use Illuminate\View\Component;

class BookCard extends Component
{
    public $book;

    public function __construct($book)
    {
        $this->book = Book::find($book);
    }

    public function render()
    {
        return view('components.book-card');
    }
}
