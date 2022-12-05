<?php

namespace App\Http\Controllers;

use App\Models\book_view;
use Illuminate\Http\Request;

class cashier_controller extends Controller
{
    public function index()
    {
        //read all data
        $books = book_view::all();
        return view('Cashier.cashier_listbook', compact('books'));
    }
}
