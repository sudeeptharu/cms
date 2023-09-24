<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $links=Link::paginate(10);
        return view('dashboard.pages.links',compact('links',));
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
        Link::insert([
            'social'=>$request->social,
            'icon'=>$request->icon,
            'url'=>$request->url,
        ]);
        return redirect('link');
    }

    /**
     * Display the specified resource.
     */
    public function show(Link $link)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Link $link)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Link $link)
    {

        $update = Link::findOrFail($request->id);
        $update->update([
            'social'=>$request->social,
            'icon'=>$request->icon,
            'url'=>$request->url,
        ]);
        return redirect('link');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Link::where(['id'=>$id])->delete();
        return redirect('link');
    }
}
