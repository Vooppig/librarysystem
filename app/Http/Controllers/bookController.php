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
        $categories = DB::select('select * from bookcatergory');
        //$categories = mod_book::all();
        return view('book.insertbook',['categories'=>$categories]);

    }
    public function do_insert(Request $request)
    {
     //Form validation
     $validated = $request->validate([
     'isbn' =>'required',
     'title'=>'required|max:30',
     'author'=>'required|alpha'
     ]);
     //DB::insert("insert into books(isbn, author)",[$request->isbn, $request->author]);
     $books = new book_lib;
     $books->title=$request->title;
     $books->isbn=$request->isbn;
     $books->author=$request->author;
     $books->publisher=$request->publisher;
     $books->category=$request->category;
     $books->save();
     return redirect("insertbook");
    }
}
