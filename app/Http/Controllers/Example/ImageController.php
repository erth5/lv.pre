<?php

namespace App\Http\Controllers\Example;

use App\Models\Example\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\ImageValidatorModule;

/**
 * 1b: yield, storage, withName
 * 2b: components, storage
 */

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::withTrashed()->get();
        return view('image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/image.upload');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param image array all saved images
     * @param name string name of image
     * @param path string path of image
     * @param requestData meta data from image
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = new ImageValidatorModule($request);
        $validator->proofImageExist();
        if ($validator != true) {
            dd('Image exist Validation Fails');
            return back()->with('statusError', __('image.existError'));
        }

        $validator->validateImage();
        if ($validator != true) {
            dd('Image has correct form Validation Fails');
            return back()->with('statusError', __('image.validateError'));
        }

        /** Syntax 1b
         * storeAs: $path, $name, $options = []
         */
        $requestData = $request->all();
        $name = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $name, 'public');
        $requestData["image"] = '/storage/' . $path;
        $metadata = Image::create();
        $metadata->name = $name;
        $metadata->path = $path;
        $metadata->saveOrFail();
        return redirect('/image/create')->with('statusSuccess', __('image.uploadSuccess'))->with('imageName', $name);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $image = (Image::first());
        return view('image.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        /** Soft-delete */
        $image->delete();

        /** Hard-delete */
        // $image->forceDelete();
        // if (Storage::exists('public/' . $image->path)) {
        //     Storage::delete('public/' . $image->path);
        // }

        return redirect('image')->with('status', 'Image Has been removed');
    }


    // /** 2b
    //  * store function
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function image(Request $request)
    // {
    //     // TODO Erkenne post oder get
    //     return view('image/image');

    //     //

    //     $validation = new ImageValidator($request);
    //     $validation->imageValidator();
    //     $name = $request->file('image')->getClientOriginalName();
    //     $path = $request->file('image')->store('image');

    //     $dbItem = new Image();
    //     $dbItem->name = $name;
    //     // path descripes the name in Path "storage/app/images
    //     $dbItem->path = $path;
    //     $dbItem->save();

    //     $images = Image::all();
    //     // dd($request, $validation, $dbItem, $name, $path);
    //     return redirect('image')->with('status', 'Image Has been uploaded:')->with('imageName', $name)->with('images', $images);
    // }



    /** Debug */
    public function debug(Request $req)
    {
        return $req;
        //Display File Name
        echo 'File Name: ' . $req->getClientOriginalName();
        echo '<br>';

        //Display File Extension
        echo 'File Extension: ' . $req->getClientOriginalExtension();
        echo '<br>';

        //Display File Real Path
        echo 'File Real Path: ' . $req->getRealPath();
        echo '<br>';

        //Display File Size
        echo 'File Size: ' . $req->getSize();
        echo '<br>';

        //Display File Mime Type
        echo 'File Mime Type: ' . $req->getMimeType('JJJJ:MM:DD');

        //copy Uploaded File
        $destinationPath = 'debugPath';
        $req->copy($destinationPath, $req->getClientOriginalName());
    }
    /** Debug */
}
