<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\book_cat;
use App\Models\book_lib;
use App\Models\book_flag;
use App\Models\book_view;

session_start();
class Manager_Controller extends Controller
{
    private function logedin()
    {
        if ($_SESSION["user"]['role'] != 3)
            return redirect('/');
    }
    public function delete($id)
    {
        $this->logedin();
        book_lib::find($id)->delete();

        return redirect("listbook");
    }
    public function index()
    {
        $this->logedin();
        //read all data
        $books = book_view::all();
        return view('Manager.book.listbook', compact('books'));
    }
    public function  insert()
    {
        $this->logedin();
        $categories = book_cat::all();
        $flags = book_flag::all();

        return view('Manager.book.insertbook', ['categories' => $categories, 'flags' => $flags]);
    }
    public function do_insert(Request $request)
    {
        $this->logedin();
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
        $this->logedin();
        $categories = book_cat::all();
        $flags = book_flag::all();

        return view('Manager.book.search', ['categories' => $categories, 'flags' => $flags]);
    }
    public function search(Request $request)
    {
        $books = book_view::where('title', 'like', '%' .  $request->input('query') . '%')->orWhere('isbn', 'like', '%' . $request->input('query') . '%')->orWhere('author', 'like', '%' . $request->input('query') . '%')->orWhere('detail', 'like', '%' . $request->input('query') . '%')->get();
        return view('Manager.book.listbook', compact('books'));
    }
    public function update_forum($id)
    {
        $this->logedin();
        $categories = book_cat::all();
        $flags = book_flag::all();
        $book = book_lib::find($id);

        return view('Manager.book.update', ['categories' => $categories, 'flags' => $flags, 'book' => $book]);
    }
    public function update(Request $request)
    {
        $this->logedin();
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
        $book->detail = $request->detail;
        $book->save();

        return redirect("listbook");
    }
}
