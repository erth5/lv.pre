<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Test;

// Aktiviere oder deaktiviere TestSeiten: false=close, true=open

class testService{
    public function testFunction($testValue = true){
        return $testValue;
    }
}
