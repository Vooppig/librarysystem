<?php

namespace App\Http\Controllers;

use App\Models\book_view;
use App\Models\library_system_ext_view;
use App\Models\library_system_res_view;
use Illuminate\Http\Request;

class cashier_controller extends Controller
{
    public function index()
    {
        //read all data
        $books = book_view::all();
        return view('Cashier.cashier_listbook', compact('books'));
    }
    public function allOrders()
    {
        $res = library_system_res_view::all();
        return view('Cashier.cashier_allorders', ['books' => $res]);
    }
    public function request()
    {
        $res = library_system_res_view::all();
        return view('Cashier.cashier_request', ['books' => $res]);
    }
    public function ext()
    {
    $ext = library_system_ext_view::all();
    return view('Cashier.cashier_ext', ['books' => $ext]);
    }
}
