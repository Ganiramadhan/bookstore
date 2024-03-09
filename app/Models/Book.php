<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['book_code','category', 'name', 'price', 'stock', 'publisher'];

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
    
    
}
