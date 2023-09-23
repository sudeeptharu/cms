<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries=Gallery::paginate(6);
        return view('dashboard.pages.galleries',compact('galleries',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function uploadImages(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            //$folder = public_path('images/gallery/'.$request->gallery_id);
            $folder =  storage_path('/app/public/images');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $slider_image_success = $file->move($folder, $filename);

            if ($slider_image_success) {

                // Get public preferences
                $slider_image = new Image();
                //$slider_image->image ='/images/gallery/'.$request->gallery_id."/". $filename;
                $slider_image->image =Storage::url("images/$filename");
                $slider_image->gallery_id = $request->gallery_id;

                $slider_image->save();

                return response()->json([
                    "status" => "success",
                ], 200);
            } else {
                return response()->json([
                    "status" => "error"
                ], 400);
            }
        } else {
            return response()->json('error: upload file not found.', 400);
        }
    }
    public function uploadedImages($id){
        $gallery_images = Image::where('gallery_id',$id)->get();

        return response()->json(['uploads' => $gallery_images]);
    }
    public function allUploadedImages(){
        $imagePath = 'public/images'; // Change this to the appropriate path where your images are stored in the public storage directory.
        $files = Storage::files($imagePath);

        $images = [];
        foreach ($files as $file) {
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
                $images[] = basename($file);
            }
        }

        return response()->json(['uploads' => $images]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Gallery::insert([
            'title'=>$request->title,
            'description'=>$request->description,
            'is_published'=>$request->is_published??0,
        ]);
        return redirect('gallery');
    }

    /**
     * Display the specified resource.
     */
    public function show($gallery_id)
    {
        $gallery = Gallery::findOrFail($gallery_id);
        return view('dashboard.pages.modals.add_edit_gallery_images')->with(['gallery'=>$gallery,'name'=>$gallery->title.' Images']);
    }
    public function deleteGalleryImage($id){
        $image = Image::findOrFail($id);

        if (isset($image)) {
            //dd($path);
            unlink(public_path($image->image));
            if ($image->delete())
                return response()->json(['message' => 'Successfully deleted Image']);
        }
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }
    public function mediaImageUpload(Request $request){
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            //$folder = public_path('images/gallery/'.$request->gallery_id);
            $folder =  storage_path('/app/public/images');
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();
            $slider_image_success = $file->move($folder, $filename);
            if ($slider_image_success) {
                return response()->json([
                    "status" => "success",
                ], 200);
            }else{
                return response()->json([
                    "status" => "error"
                ], 400);
            }

        } else {
            return response()->json('error: upload file not found.', 400);
        }
    }


    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }public function destroyImage(Gallery $gallery)
    {

    }
}
