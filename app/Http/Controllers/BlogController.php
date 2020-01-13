<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\User;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::with('users_blog')->get();


        return view('blogs.index', compact('blogs'));
    }
    public function show($id)
    {
        $blog=Blog::where('user_id','=', $id)->first();
        $posts=$blog->posts;
        $comments=$blog->comments;

        return view('posts.posts',compact('posts','blog','comments'));
    }

}
