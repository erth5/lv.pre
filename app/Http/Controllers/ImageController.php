<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Controllers\Modules\ImageValidator;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('image.show', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //1b
        $validation = new ImageValidator($request);
        $validation->imageValidator();
        // Not implement jet
        if ($validation != true) {
            return back()->with('status', 'dismiss');
        }

        /**Syntax 1
         * 
         */
        $requestData = $request->all();
        // dd($requestData);
        $name = time() . $request->file('image')->getClientOriginalName();
        // storeAs: $path, $name, $options = []
        $path = $request->file('image')->storeAs('images', $name, 'public');
        $requestData["image"] = '/storage/' . $path;
        Image::create($requestData);
        $image = Image::all();
        return redirect('upload')->with('status', 'Image Has been uploaded:')->with('imageName', $name)->with('image', $image);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteableImage = Image::find($id);
        $deleteableImage->delete();
        return redirect('images', compact('$dbItems = Image::all()'))->with('status', 'Image Has been removed')->with('Image', $deleteableImage);
    }

    /** 2b
     * store function
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function image(Request $request)
    {
        // TODO Erkenne post oder get
        return view('image/image');

        //

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

    /** Debug */
    public function debug(Request $req)
    {
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
