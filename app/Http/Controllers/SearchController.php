<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;

class SearchController extends Controller
{



    public function searchresults(Request $request)
    {
        $keyword=$request->keyword;
        $results=Post::where('title', 'LIKE', "%{$keyword}%")->orWhere('body', 'LIKE', "%{$keyword}%")->paginate(15);

        return view('searchresults',compact('results'));
    }
}
