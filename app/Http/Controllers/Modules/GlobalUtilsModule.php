<?php

namespace App\Http\Controllers\Modules;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

/**
 * füllt ein Model mit den Request Daten (inklusive Checkboxen), sofern der Spaltenname der Migration angegeben
 * und gibt dieses zurück.
 *
 * @param object object Objekt dessen Attribute gefüllt werden sollen
 * @param standardTableColumnNames array Array von attribut-Namen (string) aus dem Request, die im Objekt gefüllt werden sollen
 * @param checkboxTableColumnNames array Array von attribut-Namen (string) die checkbox-werte (boolean-werte) repräsentieren, die aus dem Request, die im Objekt gefüllt werden sollen
 * @param req request request
 * */
class GlobalUtilsModule extends Controller
{
    public function fillObjectFromRequest($object, $standardTableColumnNames,  $checkboxTableColumnNames, Request $req)
    {
        foreach ($standardTableColumnNames as $columnName) {
            if ($req->has($columnName)) {
                Log::info("columnName; columnValue:", [$columnName, $req->{$columnName}]);
                $object->{$columnName} = $req->{$columnName};
            }
            foreach ($checkboxTableColumnNames as $checkboxColumnName) {
                $req->has($checkboxColumnName) ? $object->{$checkboxColumnName} = true : $object->{$checkboxColumnName} = false;
            }
        }
        return $object;
    }
}
