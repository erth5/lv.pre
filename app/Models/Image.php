<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'path',
    ];

    // reverse changed column name to original
    const CREATED_AT = 'upload_time';
    const UPDATED_AT = 'update_time';
    const DELETED_AT = 'remove_time';


    /**
     * Relationship: get person that owns images
     */
    public function person()
    {
        return $this->belongsToMany(Person::class);
    }
}
