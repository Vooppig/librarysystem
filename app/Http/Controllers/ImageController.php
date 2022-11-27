<?php

namespace App\Http\Controllers;

use App\Models\library_system_images;
use Illuminate\Http\Request;

class ImageController extends Controller

{

    public function index()
    {

        $images = library_system_images::all();

        return view('welcome')->with('image', $images);
    }

    public function form()
    {

        return view('upload');
    }

    public function upload(Request $request)
    {

        $images = new library_system_images;

        $image = $request->image;

        $image_name = $image->getClientOriginalName();

        $image->storeAs('public/images', $image_name);

        $images->image = $image_name;
        $images->book_id = 1;

        $images->save();

        return redirect('/');
    }
    public function uploadBookPicture($id, $image)
    {
        $images = new library_system_images;
        $image_name = $image->getClientOriginalName();
        $image->storeAs('public/images', $image_name);
        $images->image = $image_name;
        $images->book_id = $id;

        $images->save();
    }
}
