<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Traits\SuccessMessage;
use Illuminate\Http\Request;
class PageController extends Controller
{
    use SuccessMessage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages=Page::paginate(10);
        return view('dashboard.pages.pages',compact('pages',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function pageAdd($id=null){
        $page = isset($id)?Page::findOrFail($id):new Page();
        return view('dashboard.pages.modals.add_edit_page',compact('page'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $page = isset($request->id)?Page::findOrFail($request->id):new Page();
        $page->title=$request->title;
        $page->subtitle=$request->subtitle;
        $page->description=$request->description;
        if(!isset($request->draft)){
            $page->draft=0;

        }else{
            $page->draft=$request->draft;

        }
        $page->quote=$request->quote;
        $page->excerpt=$request->excerpt;
        $page->image=$request->image;
        $page->slug=$request->slug;
        $page->save();
//        Page::insert([
//            'title'=>$request->title,
//            'subtitle'=>$request->subtitle,
//            'description'=>$request->description,
//            'draft'=>$request->draft??0,
//            'quote'=>$request->quote,
//            'excerpt'=>$request->excerpt,
//            'image'=>$request->image,
//            'slug'=>$request->slug
//        ]);
        $this->getSuccessMessage('Page');
        return redirect('page');
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $update = Page::findOrFail($request->id);
        $update->update([
            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'description'=>$request->description,
            'draft'=>$request->draft,
            'quote'=>$request->quote,
            'excerpt'=>$request->excerpt,
            'image'=>$request->image,
            'slug'=>$request->slug
        ]);
        $this->getUpdateSuccessMessage('Page');
        return redirect('page');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Page::where(['id'=>$id])->delete();
        $this->getDestroySuccessMEssage('Page');
        return redirect('page');
    }
}
