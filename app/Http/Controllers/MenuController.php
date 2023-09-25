<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Traits\SuccessMessage;
use Illuminate\Http\Request;
class MenuController extends Controller
{
    use SuccessMessage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus=Menu::paginate(10);
        return view('dashboard.pages.menus',compact('menus',));
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
        Menu::insert([
            'title'=>$request->title,
            'is_published'=>$request->is_published??0,
            'opens_in_new_tab'=>$request->opens_in_new_tab ,
            'url'=>$request->url,
            'parent_id '=>$request->parent_id ,
            'order'=>$request->order
        ]);
        $this->getSuccessMessage('Menu');
        return redirect('menu');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $update = Menu::findOrFail($request->id);
        $update->update([
            'title'=>$request->title,
            'is_published'=>$request->is_published,
            'opens_in_new_tab'=>$request->opens_in_new_tab ,
            'url'=>$request->url,
            'parent_id '=>$request->parent_id ,
            'order'=>$request->order
        ]);
        $this->getUpdateSuccessMessage('Menu');
        return redirect('menu');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Menu::where(['id'=>$id])->delete();
        $this->getDestroySuccessMEssage('Menu');
        return redirect('slider');
    }
}
