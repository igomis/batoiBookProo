<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo',
        'module_id',
        'price',
        'pages',
        'user_id',
        'publisher',
        'comments',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function module()
    {
        return $this->belongsTo(Module::class, 'module_id', 'code');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
