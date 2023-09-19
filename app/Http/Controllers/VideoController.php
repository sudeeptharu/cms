<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos=Video::paginate(10);
        return view('dashboard.pages.videos',compact('videos',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Video::insert([
            'title'=>$request->title,
            'url'=>$request->url,
        ]);
        return redirect('video');
    }

    /**
     * Display the specified resource.
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Video $video)
    {
        $update = Video::findOrFail($request->id);
        $update->update([
            'title'=>$request->title,
            'url'=>$request->url,
        ]);
        return redirect('video');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Video::where(['id'=>$id])->delete();
        return redirect('slider');
    }
}
