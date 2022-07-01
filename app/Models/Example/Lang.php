<?php

namespace App\Models\Example;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Lang extends Model
{
    use HasTranslations;

    public $translatable = ['language', 'abbreviation'];

    public function scopeFullAssigned($query)
    {
        return $query->where('user_id' != null && 'person_id' != null);
    }

    public function scopeAssigned($query)
    {
        return $query->where('user_id' != null || 'person_id' != null);
    }

    public function scopeUnassigned($query)
    {
        return $query->where('user_id', null && 'person_id', null);
    }
}
