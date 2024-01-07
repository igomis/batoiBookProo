<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    public $keyType = 'string';
    public $incrementing = false;


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
