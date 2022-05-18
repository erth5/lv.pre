<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImageValidator extends Controller
{
    function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function imageValidator()
    {
        // PHP Abhängigkeit - greift auf den PHP Ordner zu
        $validatedData = $this->request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        return $validatedData;
    }
}
