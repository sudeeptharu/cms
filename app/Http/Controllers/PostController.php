<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts=Post::paginate(10);
        return view('dashboard.pages.posts',compact('posts',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id=null)
    {
        $post['post'] = isset($id)?Post::findOrFail($id):new Post();
        return view('dashboard.pages.modals.add_edit_post',compact('post',));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post = isset($request->id)?Post::findOrFail($request->id):new Post();
        $post->title=$request->title;
        $post->subtitle=$request->subtitle;
        $post->description=$request->description;
        if(!isset($request->draft)){
            $post->draft=0;

        }else{
            $post->draft=$request->draft;

        }
        $post->quote=$request->quote;
        $post->excerpt=$request->excerpt;
        $post->image=$request->image;
        $post->save();
//        Post::insert([
//            'title'=>$request->title,
//            'subtitle'=>$request->subtitle,
//            'description'=>$request->description,
//            'draft'=>$request->draft??0,
//            'quote'=>$request->quote,
//            'excerpt'=>$request->excerpt,
//            'image'=>$request->image,
//        ]);
        return redirect('post');
    }
    public function postAdd($id=null){
        $post = isset($id)?Post::findOrFail($id):new Post();
//        dd($post->toArray());
        return view('dashboard.pages.modals.add_edit_post',compact('post'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $update = Post::findOrFail($request->id);
        $update->update([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'description'=>$request->description,
            'draft'=>$request->draft,
            'quote'=>$request->quote,
            'excerpt'=>$request->excerpt,
            'image'=>$request->image,
        ]);
        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::where(['id'=>$id])->delete();
        return redirect('post');
    }
}
