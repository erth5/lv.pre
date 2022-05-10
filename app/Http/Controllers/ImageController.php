<?php

namespace App\Http\Controllers;

use App\Models\Pic;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('image');
    }

    public function store(Request $request)
    {
        // PHP Abhängigkeit - greift auf den PHP Ordner zu
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

        $name = $request->file('image')->getClientOriginalName();

        $path = $request->file('image')->store('images');


        $save = new Pic();

        $save->name = $name;
        $save->path = $path;

        $save->save();
        // dd($save, $validatedData);
        return redirect('image-upload')->with('status', 'Image Has been uploaded')->with('image', $name);
    }

    
// Funktionen
// destroy
// edit
// rename->
//     ...
}
