<?php

namespace App\Models\Debug;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Debug extends Model
{
    use HasFactory, HasTranslations;

    protected $fillable = [
        'debug',
    ];
}
