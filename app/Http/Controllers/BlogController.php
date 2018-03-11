<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::get();
        if(request()->wantsJson()){
            return response($blogs,200);
        }
        return view('blogs.index',compact('blogs'));
    }

    public function store(Request $request)
    {
        $blog = new Blog([
            'title'=> $request->get('title'),
            'body' => $request->get('body'),
            'user_id' => auth()->id(),
            'uuid' => $request->get('uuid')
        ]);
        $blog->save();
        return response($blog,201);
    
    }
    public function show($uuid)
    {
        $blog = Blog::where('uuid',$uuid)->first();
        dd($blog);
    }
    public function edit($uuid)
    {
        $blog = Blog::where('uuid',$uuid)->first();
        return view('blogs.edit',compact('blog'));
    }

    public function update(Request $request, $uuid)
    {
        $blog = Blog::where('uuid',$uuid)->first();
        $blog->title = $request->get('title');
        $blog->body = $request->get('body');
        $blog->save();
        return response($blog);
    }

    public function destroy($uuid)
    {
        $blog = Blog::where('uuid',$uuid)->first();
        $blog->delete();
        return response('success'); 
    }
}
