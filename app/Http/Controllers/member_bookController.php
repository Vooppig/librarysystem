<?php

namespace App\Http\Controllers;

use App\Models\book_view;
use Symfony\Component\HttpFoundation\Request;

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
};
