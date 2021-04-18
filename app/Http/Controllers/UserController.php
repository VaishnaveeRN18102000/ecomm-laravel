<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    function login(Request $req)
    {
        $us = User::where(['email' => $req->email])->first();
        if(!$us || !Hash::check($req->password, $us->password))
        {
            return "Incorrect Username or Password";
        }
        else
        {
            $req->session()->put('user', $us);
            return redirect('/');
        }
    }
    function register(Request $req)
    {
        $us = new User;
        $us->name = $req->username;
        $us->email = $req->email;
        $us->password = Hash::make($req->password);
        $us->save();
        return redirect('/login');
    }
}
