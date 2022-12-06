<?php

namespace App\Http\Controllers;

use App\Models\bank_account;
use App\Models\book_account;
use Illuminate\Support\Facades\DB;
use App\Models\book_reservation;
use App\Models\book_sale;
use Illuminate\Http\Request;
use App\Models\book_view;
use App\Models\library_system_member;
use App\Models\library_system_res_view;
use App\Models\member;

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
        $books = $books->where('id', $id)->first();
        $books->price = $books->price * 0.3;
        return view('Member.member_orderdetail', ['tul' => "Ном Түрээслэх", 'books' => $books, 'type' => 0]);
    }
    function orderbuydetail($id)
    {
        $this->logedin();
        $books = book_view::all();
        $books = $books->where('id', $id)->first();
        return view('Member.member_orderdetail', ['tul' => "Худалдаж авах", 'books' => $books, 'type' => 1]);
    }
    function search(Request $request)
    {
        $books = book_view::where('title', 'like', '%' .  $request->input('query') . '%')->orWhere('isbn', 'like', '%' . $request->input('query') . '%')->orWhere('author', 'like', '%' . $request->input('query') . '%')->orWhere('detail', 'like', '%' . $request->input('query') . '%')->get();
        return view('Member.member_listbook', compact('books'));
    }
    public function place_order(Request $req)
    {
        $card_num = member::find($_SESSION['user']['id'])->credit_card_num;
        $bank_account = bank_account::where('card_num', $card_num)->first();
        $diff = $bank_account->amount - $req->price;
        if ($diff > 0) {
            $bank_account->amount = $diff;
            $bank_account->save();
            $res = new book_reservation();
            $res->type = ($req->type == 1) ? 'Түрэслэх' : 'Худалдаж авах';
            $res->created_by = $_SESSION['user']['id'];
            $res->book_id = $req->input('id');
            $res->address = $req->address;
            $res->save();

            return redirect(url('member_listbook'))->with('message', 'Таны захиалагийг хүлээн авлаа !');
        }
        return redirect()->back()->with('message', 'Үлдэгдэл хүрэлцэхгүй байна!!!');
    }
    public function myOrders()
    {
        $res =  library_system_res_view::where('created_by', $_SESSION['user']['id'])->get();
        return view('Member.member_myorders', ['books' => $res]);
        // return $res;
    }
    public function Account()
    {
        $card_num = member::find($_SESSION['user']['id'])->credit_card_num;
        $bank_account = bank_account::where('card_num', $card_num)->get();

        return view('Member.member_account', ['amount' => $bank_account]);
    }
};
