<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\library_system_member;

class loginController extends Controller
{
    function register(Request $request)
    {
     $user = new library_system_member();
     $user->name = $request->input('name');
     
    }
    function login(Request $request)
    {
        $user = library_system_member::where('email',$request->input('email'))->first();
        if($user->password==$request->password)
        {
            $request->session()->put('user',$user->name);
            if($user->role==1)
            return redirect('listbook');
            if($user->role==2)
            return redirect('/');
            if($user->role==3)
            return redirect('/');
        }

    }

}

