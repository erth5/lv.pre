<?php

namespace App\Models\Example;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Lang extends Model
{
    use HasTranslations;

    public $translatable = ['language', 'abbreviation'];
}
