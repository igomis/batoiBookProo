<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->hasMany(Book::class, 'module_id', 'code');
    }

    public function family()
    {
        return $this->belongsTo(Family::class, 'idFamily');
    }
}
