<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Traits\SuccessMessage;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use SuccessMessage;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=Category::paginate(10);
        return view('dashboard.pages.categories',compact('categories',));
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
        Category::insert([
            'title'=>$request->title,
        ]);
        $this->getSuccessMessage('category');
        return redirect('category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $update = Category::findOrFail($request->id);
        $update->update([
            'title'=>$request->title,

        ]);
        $this->getUpdateSuccessMessage('category');
        return redirect('category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::where(['id'=>$id])->delete();
        $this->getDestroySuccessMEssage('category');
        return redirect('category');
    }
}
