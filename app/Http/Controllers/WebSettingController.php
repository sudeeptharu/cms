<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use Illuminate\Http\Request;

class WebSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $web_settings=WebSetting::paginate(10);
        return view('dashboard.pages.web_settings',compact('web_settings',));
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
        WebSetting::insert([
            'key'=>$request->key,
            'value'=>$request->value,
            'image'=>$request->image,
            'align'=>$request->align
        ]);
        return redirect('websetting');
    }

    /**
     * Display the specified resource.
     */
    public function show(WebSetting $webSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebSetting $webSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WebSetting $webSetting)
    {
        $update = WebSetting::findOrFail($request->id);
        $update->update([
            'key'=>$request->key,
            'value'=>$request->value,
            'image'=>$request->image,
            'align'=>$request->align
        ]);
        return redirect('websetting');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        WebSetting::where(['id'=>$id])->delete();
        return redirect('slider');
    }
}
