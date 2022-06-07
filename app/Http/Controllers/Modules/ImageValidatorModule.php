<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageValidatorModule extends Controller
{
    // PHP Abhängigkeit - greift auf den PHP Ordner zu
    function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function proofImageExist()
    {
        // $request->validate ist eine Methode von Request
        $validatedExistence = $this->request->validate([
            'image' => 'required',
        ]);
        return $validatedExistence;
    }

    public function validateImage()
    {
        $validatedImage = $this->request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        return $validatedImage;
    }
}
