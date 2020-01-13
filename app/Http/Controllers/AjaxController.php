<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AjaxController extends Controller
{

    public function checkemail(Request $request)
    {

$check=User::where('email',$request->email)->count();
if($check ==0)
    return \Response::json(true);

else
    return \Response::json(false);

    }
}
