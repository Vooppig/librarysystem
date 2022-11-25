<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mod_book extends Model
{
    use HasFactory;
    protected $table = "library_system_book_cat";
    protected $primaryKey = "id";
}
