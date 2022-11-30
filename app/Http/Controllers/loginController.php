<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\library_system_member;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

session_start();

class loginController extends Controller
{
    function register(Request $request)
    {
        $user = new library_system_member();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = md5($request->password);
        $user->address = $request->address;
        $user->phone_num = $request->number;
        $user->credit_card_num = $request->card_num;
        $user->reg_num = $request->reg_num;
        $user->save();

        Mail::to($request->email)->send(new WelcomeMail());
        return redirect('listbook')->with('message', 'Амжилттай бүртгэгдлээ!');
    }

    public function login(Request $request)
    {
        $user = library_system_member::where('email', $request->input('email'))->first();
        if ($user->password == md5($request->password)) {
            $_SESSION["user"] = ['name' => $user->name, 'mail' => $user->email, 'role' => $user->role];
            if ($user->role == 3)
                return redirect('listbook');
            if ($user->role == 2)
                return redirect('listbook');
            if ($user->role == 1)
                return redirect('member_listbook');
        }
        return redirect('login');
    }
    public function logout()
    {
        session_unset();
        return redirect('login');
    }
}
