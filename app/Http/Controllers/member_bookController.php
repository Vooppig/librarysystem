<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\book_reserved;
use Illuminate\Http\Request;
use App\Models\book_view;


session_start();


class member_bookController extends Controller
{
    private function logedin()
    {
        if ($_SESSION["user"]['role'] != 1)
            redirect('/');
    }
    public function index()
    {
        //read all data
        $books = book_view::all();
        return view('Member.member_listbook', compact('books'));
    }
    function detail($id)
    {
        $books = book_view::all();
        $books = $books->where('id', $id);
        return view('Member.member_detail', ['books' => $books]);
    }
    function orderdetail($id)
    {
        $this->logedin();
        $books = book_view::all();
        $books = $books->where('id', $id);
        return view('Member.member_orderdetail', ['books' => $books]);
    }
    function search(Request $request)
    {
        $books = book_view::where('title','like', '%'.  $request->input('query'). '%')->orWhere('isbn','like','%'. $request->input('query').'%')->orWhere('author','like','%'. $request->input('query').'%')->orWhere('detail','like','%'. $request->input('query').'%')->get();
        return view('Member.member_listbook',compact('books'));
    }
    function orderPlace(Request $request)
    {
        return $request->input();
    }
};
