<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_lib extends Model
{
    use HasFactory;
    protected $table ="library_system_reserved_books";
    protected $primaryKey = "id";
}
