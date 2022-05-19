<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Modules\ImageValidator;
use App\Models\Image;
use Illuminate\Http\Request;

/** (folder)
 * 1a: yield, public 
 * 1b: yield, storage
 * 2a: components, public
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
        //2b
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
        // dd($request, $validation, $dbItem, $name, $path);
        return redirect('upload')->with('status', 'Image Has been uploaded:')->with('imageName', $name)->with('images', $images);
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

    //1a
    public function image()
    {
        return view('image/image');
    }
}
