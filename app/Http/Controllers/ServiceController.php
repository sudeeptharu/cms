<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services=Service::paginate(10);
        return view('dashboard.pages.services',compact('services',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id=null)
    {
        $service['service'] = isset($id)?Service::findOrFail($id):new Service();
        return view('dashboard.pages.modals.add_edit_service',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Service::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'icon'=>$request->icon,
            'excerpt'=>$request->excerpt,
            'image'=>$request->image,
        ]);
        return redirect('service');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        $update = Service::findOrFail($request->id);
        $update->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'icon'=>$request->icon,
            'excerpt'=>$request->excerpt,
            'image'=>$request->image,
        ]);
        return redirect('service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Service::where(['id'=>$id])->delete();
        return redirect('service');
    }
}
