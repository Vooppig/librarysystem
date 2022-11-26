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
        return view('Manager.book.listbook', compact('books'));
    }
    public function  insert()
    {
        $categories = DB::select('select * from library_system_book_cat');
        $flags = DB::select('select * from library_system_flags');
        return view('Manager.book.insertbook', ['categories' => $categories, 'flags' => $flags]);
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
        return redirect("listbook");
    }
    public function search_forum()
    {
        $categories = DB::select('select * from library_system_book_cat');
        $flags = DB::select('select * from library_system_flags');
        return view('Manager.book.search', ['categories' => $categories, 'flags' => $flags]);
    }
    public function search(Request $request)
    {
        $categories = DB::select('select * from library_system_book_cat');
        $flags = DB::select('select * from library_system_flags');
        $query = book_lib::all();
        if (isset($request->title))
            $query->where('title', $request->title);
        if (isset($request->isbn))
            $query->where('ISBN', $request->isbn);
        if (isset($request->author))
            $query->where('author', $request->author);
        if (isset($request->flag))
            $query->where('flag', $request->flag);
        if (isset($request->publisher))
            $query->where('publisher', $request->publisher);
        if (isset($request->category))
            $query->where('category', $request->category);
        return view('Manager.book.search', ['categories' => $categories, 'flags' => $flags, 'results' => $query->get('0')]);
    }
}
