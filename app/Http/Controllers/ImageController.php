<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Modules\ImageValidator;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::all();
        return view('image.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('image/upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1b
        $validator = new ImageValidator($request);
        $validator->proofImageExist();
        if ($validator != true) {
            dd('f1');
        }

        $validator->validateImage();
        // Not implement jet
        if ($validator != true) {
            dd('f2');
            // return back()
        }

        /** Syntax 1
         */
        $requestData = $request->all();
        $name = time() . $request->file('image')->getClientOriginalName();
        // storeAs: $path, $name, $options = []
        $path = $request->file('image')->storeAs('images', $name, 'public');
        $requestData["image"] = '/storage/' . $path;
        Image::create($requestData);
        $image = Image::all();
        return redirect('upload')->with('status', 'Image Has been uploaded:')->with('imageName', $name)->with('image', $image);

        /** Syntax 2
         */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
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
        // $deleteableImage = Image::find($image);
        $image->delete();
        return redirect('images', compact('$dbItems = Image::all()'))->with('status', 'Image Has been removed')->with('Image', $image);
    }
}
