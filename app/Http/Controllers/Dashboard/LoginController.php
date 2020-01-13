<?php


namespace App\Http\Controllers\Dashboard;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Auth;


class LoginController extends Controller
{

    public function index(Request $request)
    {

       return view('dashboard.auth.login');

    }

    public function authenticate(Request $request) {


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials , $request->has('rememberme') )) {
if(Auth::user()->getRoleNames()->first()=='Admin')

{
    return redirect('dashboard/users');
}
else
{
    return redirect('dashboard/login')->withInput()->withErrors(['email'=>'Users Not Allowed']);

}


        }
        else
        {
            return redirect('dashboard/login')->withInput()->withErrors(['email'=>'Invalid email Or Password']);
        }

    }

    function logout() {
        \Auth::logout();
        session()->flush();
        return redirect()->back();
    }
}
