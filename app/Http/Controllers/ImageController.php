<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Modules\ImageValidator;
use App\Models\Image;
use Illuminate\Http\Request;

/**
 * --: yield, public ->public_path()
 * 1b: yield, storage
 * --: components, public
 * 2b: components, storage
 */

class ImageController extends Controller
{

    /**
     * upload an image
     */
    public function upload(Request $request)
    {
        return view('image/upload');
    }

    /**
     * save an image
     * @param validatedData 
     */
    public function store(Request $request)
    {
        //1b
        $validation = new ImageValidator($request);
        $validation->imageValidator();
        // name desciptes the uploaders file-system name
        $name = $request->file('image')->getClientOriginalName();
        // path descripes the Path from "storage/app/"
        // $path = $request->file('image')->store('images');
        $path = $request->file('image')->store('image');

        $dbItem = new Image();
        $dbItem->name = $name;
        $dbItem->path = $path;
        $dbItem->save();

        $images = Image::all();
        // dd($request, $validation, $dbItem, $name, $path);
        return redirect('upload')->with('status', 'Image Has been uploaded:')->with('imageName', $name)->with('images', $images);
    }

    public function remove(Image $image)
    {
        // $image = Imagename;
        // $image->delete();
        // return redirect('images', compact('$dbItems = Image::all()'))->with('status', 'Image Has been removed')->with('Image', $name);
    }


    public function show()
    {
        $images = Image::all();
        return view('image.show', compact('images'));
    }
    // Funktionen

    // destroy
    // edit
    // rename->
    //   ...

    //2b
    /**
     * index
     */
    public function imageIndex()
    {
        return view('image/image');
    }

    /**
     * store function
     */
    public function image(Request $request)
    {
        $validation = new ImageValidator($request);
        $validation->imageValidator();
        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('image');

        $dbItem = new Image();
        $dbItem->name = $name;
        // path descripes the name in Path "storage/app/images
        $dbItem->path = $path;
        $dbItem->save();

        $images = Image::all();
        // dd($request, $validation, $dbItem, $name, $path);
        return redirect('image')->with('status', 'Image Has been uploaded:')->with('imageName', $name)->with('images', $images);
    }
}
