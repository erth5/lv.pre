<?php

namespace App\Models\Example;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Person extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'surname',
        //Spell-checked:Last Name will be written with blank line
        'last_name',
        'username',
    ];

    /**
     * Relationship: get user that owns person
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship: get images associated with person
     */
    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
