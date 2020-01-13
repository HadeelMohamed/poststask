<?php


namespace App\Http\Controllers;


use App\Blog;
use App\Post;
use Illuminate\Http\Request;
use Auth;
use Intervention\Image\ImageManagerStatic as Image;
use File;
use Redirect;


class PostController extends Controller
{

    function __construct()
    {
        $this->middleware(['auth','verified']);

        $this->middleware('permission:post-list|post-create|post-edit|post-delete', ['only' => ['index','show']]);
        $this->middleware('permission:post-create', ['only' => ['create','store']]);
        $this->middleware('permission:post-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:post-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $blog=Blog::where('user_id','=',  Auth::user()->id)->first();
        $posts=$blog->posts;
        $comments=$blog->comments;


        return view('posts.posts',compact('posts','blog','comments'));
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $path_images = public_path().'/images/posts/';

        $currentstamp=date("Y-m-d H:i:s");
        $slug = $request->title.'-'.$currentstamp;
        $slug = strtolower(str_replace(array(' ',':'), '', $slug));






        if(!file_exists( $path_images )){
            mkdir($path_images, 0777, true);
            File::makeDirectory($path_images, $mode = 0777, true, true);
        }




        // raw image
        $logo = $request->image;
        $logoExt =$logo->getClientOriginalExtension();
        $logo->move($path_images,$slug.'-logo.'.$logoExt);

        $logo = Image::make($path_images.'/'.$slug.'-logo.'.$logoExt);
        $logo->resize(500, null, function ($constraint) {
            $constraint->aspectRatio();
        });
        $logo->save($path_images.'/'.$slug.'-logo.'.$logoExt);

        $blog=Blog::where('user_id','=',  Auth::user()->id)->first();

        Post::create(['body'=>$request->body,'title'=>$request->title,'image'=>$slug.'-logo.'.$logoExt,'blog_id'=>$blog->id]);


        return redirect()->to('/posts')
            ->with('success','Post created successfully.');
    }



    public function edit(Post $post)
    {

        return view('posts.edit',compact('post'));
    }




    public function update(Request $request, Post $post)
    {

if($request->has('image'))
{
    $path_images = public_path().'/images/posts/';

    $currentstamp=date("Y-m-d H:i:s");
    $slug = $request->title.'-'.$currentstamp;
    $slug = strtolower(str_replace(array(' ',':'), '', $slug));






    if(!file_exists( $path_images )){
        mkdir($path_images, 0777, true);
        File::makeDirectory($path_images, $mode = 0777, true, true);
    }




    // raw image
    $logo = $request->image;
    $logoExt =$logo->getClientOriginalExtension();
    $logo->move($path_images,$slug.'-logo.'.$logoExt);

    $logo = Image::make($path_images.'/'.$slug.'-logo.'.$logoExt);
    $logo->resize(500, null, function ($constraint) {
        $constraint->aspectRatio();
    });
    $logo->save($path_images.'/'.$slug.'-logo.'.$logoExt);
}

        $post->update(['title'=>$request->title,'body'=>$request->body,'image'=> (isset($request->image)) ? $slug.'-logo.'.$logoExt :$post->image]);


        return redirect()->to('/posts')
            ->with('success','Post updated successfully');
    }



}
