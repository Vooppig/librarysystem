<?php

namespace App\Http\Controllers;

use App\Models\book_reservation;
use App\Models\book_view;
use App\Models\ext_req;
use App\Models\library_system_ext_view;
use App\Models\library_system_extension_request_view;
use App\Models\library_system_res_view;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $res = library_system_extension_request_view::all();
        return view('Cashier.cashier_request', ['books' => $res]);
    }
    public function ext()
    {
        $ext = library_system_ext_view::all();
        return view('Cashier.cashier_ext', ['books' => $ext]);
    }
    public function approve($id)
    {
        $target = ext_req::find($id);
        $target->status = "Амжилттай";
        $target->accepted_date = DB::raw('NOW()');
        $target->accepted_datetime = DB::raw('NOW()');
        $res_id = $target->res_id;
        $target_res = book_reservation::find($res_id);
        $target_res->end_date = DB::raw('date_add(now(),interval 7 day)');
        $target_res->save();
        $target->save();
        return redirect('cashier_request');
    }
}
