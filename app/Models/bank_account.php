<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank_account extends Model
{
    use HasFactory;
    protected $table = "library_system_bank_account";
    protected $primaryKey = "id";
}
