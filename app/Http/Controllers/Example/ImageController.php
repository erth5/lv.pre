<?php

namespace App\Http\Controllers\Example;

use Illuminate\Http\Request;
use App\Models\Example\Image;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Modules\ImageValidatorModule;

/**
 * variant1: ressource, yield, storage, withName
 * variant2: components, storage
 */

class ImageController extends Controller
{
    /* variant1 */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::withTrashed()->get();
        // performance: 1 querie->good
        if ($images->isEmpty())
            return view('image.index');
        else
            return view('image.index', compact('images'));
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
        /* Variante 1 - Automatisches Validieren durch spezifiziertenRequest ImageRequest TODO nicht implementiert */
        /* Variante 2 - Aufruf der Rule TODO nicht getestet */
        /* Varinate 2 - Aufruf des Modules TODO */
        /* Variante 4 - Aufruf mit Service TODO */

        // /** Syntax 2b */
        // $image = Image::find($image);
        // $requestData = $request->all();
        // $name = time() . $request->file('image')->getClientOriginalName();
        // dd($request);
        // $request->file('image')->move('images', $name, 'public');
        // $image->name = $name;
        // $image->path = ('images' . $name);
        // $image->saveOrFail();
        // return view('image', compact($request, $image));


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

        /** storeAs: $path, $name, $options = []     */
        $requestData = $request->all();
        $name = time() . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->storeAs('images', $name, 'public');
        $requestData["image"] = '/storage/' . $path;
        $metadata = Image::create();
        $metadata->name = $name;
        $metadata->path = $path;
        $metadata->saveOrFail();
        $images = Image::all();
        return redirect('/image/index')->with('statusSuccess', __('image.uploadSuccess'))->with(compact('images'), 'imageName', $name);
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
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $image = Image::first();
        return view('image.show', compact('image'));
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

        return redirect()->back()->with('status', 'Image Has been removed');
    }

    /** 
     * Restore the specific resource, when it's soft-deleted
     * 
     * @param \App\Models\Example\Image
     * @return \Illuminate\Http\Response
     */
    public function restore($image)
    {
        $image = Image::withTrashed()->findOrFail($image);
        $image->remove_time = null;
        $image->saveOrFail();
        return redirect()->back()->with('status', 'Image Has been restored');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        $image = Image::find($image);
        return view('image.edit', compact('image'));
    }

    /** MISSING */
    public function rename (Request $request, Image $image){
        $image = Image::find($image);
        // dd($request);
        $image->name = $request->name;
        return view('image.show');
        // return redirect()->back()->with('status', 'Image Has been renamed');
    }

    // /** variant 2
    //  * store function
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    public function image(Request $request)
    {
        // TODO Erkenne post oder get: Wenn get:
        return view('image.all');


        // Wenn post:

        // $validation = new ImageValidator($request);
        // $validation->imageValidator();
        // $name = $request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->store('image');

        // $dbItem = new Image();
        // $dbItem->name = $name;
        // // path descripes the name in Path "storage/app/images
        // $dbItem->path = $path;
        // $dbItem->saveOrFail();

        // $images = Image::all();
        // // dd($request, $validation, $dbItem, $name, $path);
        // return redirect('image')->with('status', 'Image Has been uploaded:')->with('imageName', $name)->with('images', $images);
    }




    /** Debug Image Data*/
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
