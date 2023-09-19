<?php

namespace App\Http\Controllers;

use App\Models\Scroller;
use Illuminate\Http\Request;

class ScrollerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $scrollers=Scroller::paginate(10);
        return view('dashboard.pages.scrollers',compact('scrollers',));
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
        Scroller::insert([
            'title'=>$request->title,
            'url'=>$request->url,
        ]);
        return redirect('scroller');
    }

    /**
     * Display the specified resource.
     */
    public function show(Scroller $scroller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Scroller $scroller)
    {
        dd($request->toArray());
        $update = Scroller::findOrFail($request->id);
        $update->update([
            'title'=>$request->title,
            'url'=>$request->url,
        ]);
        return redirect('scroller');    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Scroller::where(['id'=>$id])->delete();
        return redirect('scroller');
    }
}
