<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'isbn_no',
        'name',
        'author',
        'date_published',
        'physical_qty',
        'synopsis',
        'notes',
        'book_cover',
        'subject',
        'digital_copy',
    ];
}
