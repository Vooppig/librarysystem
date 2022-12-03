<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ext_req extends Model
{
    use HasFactory;
    protected $table = "library_system_extenseion_request";
    protected $primaryKey = 'id';
}
