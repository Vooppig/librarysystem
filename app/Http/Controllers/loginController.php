<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\library_system_member;
use Illuminate\Contracts\Session\Session;

class loginController extends Controller
{
    function register(Request $request)
    {
     $user = new library_system_member();
     $user->name = $request->name;
     $user->email = $request->email;
     $user->password =md5($request->password);
     $user->address = $request->address;
     $user->phone_num = $request->number;
     $user->credit_card_num = $request->card_num;
     $user->reg_num = $request-> reg_num;
     $user->save();

    }

    public function login(Request $request)
    {
        $user = library_system_member::where('email',$request->input('email'))->first();
        if($user->password==md5($request->password))
        {
            $user_session=new Session();
            $user_session->put('user',array('role' => $user->role,'name'=>$user->name));
            
            
            if($user->role==3)
             return redirect('listbook');
             if($user->role==2)
            return redirect('/');
             if($user->role==1)
            return redirect('/');
        }
        return redirect('login');

    }
}
