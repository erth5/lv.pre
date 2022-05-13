<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Models\Debug;

// Aktiviere oder deaktiviere TestSeiten: false=close, true=open

class DebugService
{
    public function debugFunction($debugValue = false)
    {
        return $debugValue;
    }
}
