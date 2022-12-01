<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_lib extends Model
{
    use HasFactory;
<<<<<<< HEAD
    protected $table ="library_system_reserved_books";
=======
    protected $table = "library_system_book";
>>>>>>> 85cb95d220cc2db67932435eda6ba080595e3548
    protected $primaryKey = "id";
    protected $fillable = ['title', 'author', 'flag', 'publisher', 'isbn', 'price'];
}
