<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

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

    public function proofDatabaseFields($model, $columns)
    {
        $currentColumns = Schema::getColumnListing($model);
        foreach ($columns as $column) {
            if (!in_array($column, $currentColumns))
                return false;
        }
        foreach ($currentColumns as $currentColumn) {
            if (!in_array($currentColumn, $columns))
                return false;
        }
        return true;
    }
}
