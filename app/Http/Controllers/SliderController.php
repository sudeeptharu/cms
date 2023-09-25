<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Traits\SuccessMessage;
use Illuminate\Http\Request;
class SliderController extends Controller
{
    use SuccessMessage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders=Slider::paginate(10);
        return view('dashboard.pages.sliders',compact('sliders',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data=$request->validate([
            'title'=>'required',
           'description'=>'required',
           'is_published'=>'boolean',
           'url'=>'required',
           'image'=>'required',
           'order'=>'required'
       ]);
//
       Slider::insert([
           'title'=>$request->title,
           'description'=>$request->description,
           'is_published'=>$request->is_published??0,
           'url'=>$request->url,
           'image'=>$request->image,
           'order'=>$request->order
       ]);
       $this->getDestroySuccessMEssage('Slider');
       return redirect('slider');
//
   }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slider $slider)
    {
        $update = Slider::findOrFail($request->id);
        $update->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_published'=>$request->is_published,
            'url'=>$request->url,
            'image'=>$request->image,
            'order'=>$request->order
        ]);
        $this->getUpdateSuccessMessage('Slider');
        return redirect('slider');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Slider::where(['id'=>$id])->delete();
        $this->getDestroySuccessMEssage('Slider');
        return redirect('slider');
    }
}
