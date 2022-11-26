<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\mod_book;
use App\Models\book_lib;

class bookController extends Controller
{
    //
    public function delete($id)
    {
        //DB::delete('delete from books where book_id = ?', [$id]);
        book_lib::find($id)->delete();
        return redirect("listbook");
    }
    public function index()
    {
        //read all data
        $books = book_lib::all();
        return view('book.listbook', compact('books'));
    }
    public function  insert()
    {
        $categories = DB::select('select * from library_system_book_cat');
        $flags = DB::select('select * from library_system_flags');
        return view('book.insertbook', ['categories' => $categories, 'flags' => $flags]);
    }
    public function do_insert(Request $request)
    {
        //Form validation
        $validated = $request->validate([
            'isbn' => 'required',
            'title' => 'required|max:30',
            'author' => 'required|alpha'
        ]);
        //DB::insert("insert into books(isbn, author)",[$request->isbn, $request->author]);
        $books = new book_lib;
        $books->title = $request->title;
        $books->isbn = $request->isbn;
        $books->author = $request->author;
        $books->publisher = $request->publisher;
        $books->category = $request->category;
        $books->flag = $request->flag;
        $books->price = $request->price;
        $books->save();
        return redirect("insertbook");
    }
}
