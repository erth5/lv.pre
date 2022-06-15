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

    /**
     * @param class-string  $model \Illuminate\Database\Eloquent\Model
     * @param array $columns erwartete Datenbank-Spalten-Namen
     */
    public function proofDatabaseFields(string $modelClass, $columns)
    {
        $currentColumns = Schema::getColumnListing($modelClass);
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
