<?php

namespace App\Http\Controllers\Modules;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class UtilsModul extends Controller
{
    /** EXAMPLE
     * gibt die Spalten einer DB zurück */
    public function getDatabaseColumnNames($table)
    {
        Schema::getColumnListing($table);
    }
}
