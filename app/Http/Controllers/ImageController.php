<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Modules\ImageValidator;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('overall/image');
    }

    /**
     * save a picture
     * @param validatedData 
     */
    public function store(Request $request)
    {
        $validation = new ImageValidator($request);
        $validation->imageValidator();

        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('images');

        $dbItem = new Image();
        $dbItem->name = $name;
        // path descripes the name in Path "storage/app/images
        $dbItem->path = $path;
        $dbItem->save();

        $images = Image::all();
        // dd($dbItem, $validatedData, $name, $path);
        return redirect('image')->with('status', 'Image Has been uploaded:')->with('imageName', $name)->with('images', $images);
    }

    public function remove(Image $image)
    {
        // $image = Imagename;
        // $image->delete();
        // return redirect('images', compact('$dbItems = Image::all()'))->with('status', 'Image Has been removed')->with('Image', $name);
    }


    // Funktionen
    // destroy
    // edit
    // rename->
    //   ...
}
