<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\book_cat;
use App\Models\book_lib;
use App\Models\book_flag;

class bookController extends Controller
{
    //
    public function delete($id)
    {
        book_lib::find($id)->delete();
        return redirect("listbook");
    }
    public function index()
    {
        //read all data
        $books = DB::select('select a.*,b.name as cat_name,c.name as flag_name,d.image
        from library_system_book as a 
        left join library_system_book_cat as b on a.category = b.id
        left join library_system_flags as c on a.flag = c.id
        left join library_system_images as d on d.book_id=a.id
        ;');
        return view('Manager.book.listbook', compact('books'));
    }
    public function  insert()
    {
        $categories = book_cat::all();
        $flags = book_flag::all();
        return view('Manager.book.insertbook', ['categories' => $categories, 'flags' => $flags]);
    }
    public function do_insert(Request $request)
    {
        //Form validation
        $validated = $request->validate([
            'isbn' => 'required',
            'title' => 'required|max:30',
            'author' => 'required|alpha',
            'image' => 'required'
        ]);
        $books = new book_lib;
        $books->title = $request->title;
        $books->isbn = $request->isbn;
        $books->author = $request->author;
        $books->publisher = $request->publisher;
        $books->category = $request->category;
        $books->flag = $request->flag;
        $books->price = $request->price;
        $books->save();


        //Номний зураг бүртгэх
        $book = book_lib::where('isbn', $request->isbn);
        app('App\Http\Controllers\ImageController')->uploadBookPicture($books->id, $request->image);

        return redirect("listbook");
    }
    public function search_forum()
    {
        $categories = book_cat::all();
        $flags = book_flag::all();
        return view('Manager.book.search', ['categories' => $categories, 'flags' => $flags]);
    }
    public function search(Request $request)
    {
        $categories = book_cat::all();
        $flags = book_flag::all();
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
        return view('Manager.book.search', ['categories' => $categories, 'flags' => $flags, 'results' => $query]);
    }
    public function update_forum($id)
    {
        $categories = book_cat::all();
        $flags = book_flag::all();
        $book = book_lib::find($id);
        return view('Manager.book.update', ['categories' => $categories, 'flags' => $flags, 'book' => $book]);
    }
    public function update(Request $request)
    {
        $validated = $request->validate([
            'isbn' => 'required',
            'title' => 'required|max:30',
            'author' => 'required|alpha'
        ]);
        $book = book_lib::find($request->id);
        $book->title = $request->title;
        $book->isbn = $request->isbn;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->category = $request->category;
        $book->flag = $request->flag;
        $book->price = $request->price;
        $book->save();
        return redirect("listbook");
    }
}
