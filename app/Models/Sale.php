<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'date',
        'status',
    ];

    public function Book()
    {
        return $this->belongsTo(Book::class);
    }

    public function Comprador()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
