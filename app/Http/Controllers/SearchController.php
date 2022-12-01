<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $books = DB::select('select a.*,b.name as cat_name,c.name as flag_name,d.image
            from library_system_book as a 
            left join library_system_book_cat as b on a.category = b.id
            left join library_system_flags as c on a.flag = c.id
            left join library_system_images as d on d.book_id=a.id
            ;');
        }
    }
}
