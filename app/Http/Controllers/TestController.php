<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        // $array = file("../app/http/Controllers/README.md", FILE_SKIP_EMPTY_LINES);
        $array = file("../model_list.txt", FILE_SKIP_EMPTY_LINES);

        // dd(getcwd());
        print_r($array);
        foreach ($array as $arr){
            printf($arr);
        }
    }
}
