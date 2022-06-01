<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Debug;

// Aktiviere oder deaktiviere TestSeiten: false=close, true=open

/**
 * @package App\Services
 */
class DebugService
{
    public function debugFunction($debugValue = false)
    {
        return $debugValue;
    }
}
