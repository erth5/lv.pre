<?php

namespace App\Models\Debug;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Debug extends Model
{
    use HasFactory;

    // protected $fillable = ['debug'];
    protected $localizable = ['debug'];
}
