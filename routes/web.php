<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ScrollerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\WebSettingController;
use App\Http\Controllers\LinkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function () {
    return redirect('slider');
});

Route::get('slider',[SliderController::class,'index']);
Route::post('/slider/save',[SliderController::class,'store']);
Route::put('/slider/update',[SliderController::class,'update']);
Route::get('slider/delete/{id}',[SliderController::class,'destroy']);

Route::get('category',[CategoryController::class,'index']);
Route::post('/category/save',[CategoryController::class,'store']);
Route::put('/category/update',[CategoryController::class,'update']);
Route::get('category/delete/{id}',[CategoryController::class,'destroy']);

Route::get('scroller',[ScrollerController::class,'index']);
Route::post('/scroller/save',[ScrollerController::class,'store']);
Route::put('/scroller/update',[ScrollerController::class,'update']);
Route::get('scroller/delete/{id}',[ScrollerController::class,'destroy']);

Route::get('service',[ServiceController::class,'index']);
Route::get('/service/create/{id?}', [PostController::class,'create'])->name('create-post');
Route::post('/service/save',[ServiceController::class,'store']);
Route::put('/service/update',[ServiceController::class,'update']);
Route::get('service/delete/{id}',[ServiceController::class,'destroy']);

Route::get('gallery',[GalleryController::class,'index']);
Route::post('/gallery/save',[GalleryController::class,'store']);
Route::put('/gallery/update',[GalleryController::class,'update']);
Route::get('gallery/delete/{id}',[GalleryController::class,'destroy']);

Route::get('gallery/images/{gallery_id}',[GalleryController::class,'show']);
Route::get('gallery/images/uploaded_files/{id}', [GalleryController::class,'uploadedImages']);
Route::post('gallery/images/upload_files',[GalleryController::class,'uploadImages']);
Route::get('/gallery/images/delete/{id}', [GalleryController::class,'deleteGalleryImage']);

Route::get('/mediaManager', function (){
    return view('dashboard.pages.mediamanager');
});
Route::get('/mediaManager/image', [GalleryController::class,'allUploadedImages']);
Route::post('/mediaManager/uploadmedia', [GalleryController::class,'mediaImageUpload']);
Route::post('/mediaManager/destroyImage', [GalleryController::class,'destroyImage']);

Route::get('image',[ImageController::class,'index']);
Route::post('/image/save',[ImageController::class,'store']);
Route::put('/image/update',[ImageController::class,'update']);
Route::get('image/delete/{id}',[ImageController::class,'destroy']);

Route::get('video',[VideoController::class,'index']);
Route::post('/video/save',[VideoController::class,'store']);
Route::put('/video/update',[VideoController::class,'update']);
Route::get('video/delete/{id}',[VideoController::class,'destroy']);

Route::get('page',[PageController::class,'index']);
Route::get('page/add/{id?}',[PageController::class,'pageAdd']);
Route::post('/page/save',[PageController::class,'store']);
Route::put('/page/update',[PageController::class,'update']);
Route::get('page/delete/{id}',[PageController::class,'destroy']);

Route::get('post',[PostController::class,'index']);
Route::get('post/add/{id?}',[PostController::class,'postAdd']);
Route::post('/post/save',[PostController::class,'store']);
Route::put('/post/update',[PostController::class,'update']);
Route::get('post/delete/{id}',[PostController::class,'destroy']);

Route::get('menu',[MenuController::class,'index']);
Route::post('/menu/save',[MenuController::class,'store']);
Route::put('/menu/update',[MenuController::class,'update']);
Route::get('menu/delete/{id}',[MenuController::class,'destroy']);

Route::get('webSetting',[WebSettingController::class,'index']);
Route::post('/webSetting/save',[WebSettingController::class,'store']);
Route::put('/webSetting/update',[WebSettingController::class,'update']);
Route::get('/webSetting/delete/{id}',[WebSettingController::class,'destroy']);

Route::get('link',[LinkController::class,'index']);
Route::post('link/save',[LinkController::class,'store']);
Route::put('link/update',[LinkController::class,'update']);
Route::get('link/delete/{id}',[LinkController::class,'destroy']);
