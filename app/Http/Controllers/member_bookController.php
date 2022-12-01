<?php

namespace App\Http\Controllers;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;



class member_bookController extends Controller
{
    public function index()
    {
        //read all data
        $books = DB::select('select a.*,b.name as cat_name,c.name as flag_name,d.image
        from library_system_book as a 
        left join library_system_book_cat as b on a.category = b.id
        left join library_system_flags as c on a.flag = c.id
        left join library_system_images as d on d.book_id=a.id
        ;');
        return view('Member.member_listbook', compact('books'));
    }
    function detail($id)
    {

        $books = DB::select('select a.*,b.name as cat_name,c.name as flag_name,d.image
        from library_system_book as a 
        left join library_system_book_cat as b on a.category = b.id
        left join library_system_flags as c on a.flag = c.id
        left join library_system_images as d on d.book_id=a.id
        where a.id='.$id.'
        ;');
        return view('Member.member_detail', ['books' => $books]);
    }
    function orderdetail($id)
    {
        $books = DB::select('select a.*,b.name as cat_name,c.name as flag_name,d.image
        from library_system_book as a 
        left join library_system_book_cat as b on a.category = b.id
        left join library_system_flags as c on a.flag = c.id
        left join library_system_images as d on d.book_id=a.id
        where a.id='.$id.'
        ;');
    return view('Member.member_orderdetail',['books'=>$books]);
    
    }

};
