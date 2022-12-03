<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book_sale extends Model
{
    use HasFactory;
    protected $table = "library_system_sales_hist";
    protected $primaryKey = "id";
}
