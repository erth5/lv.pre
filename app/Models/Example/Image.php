<?php

namespace App\Models\Example;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'path',
    ];

    protected $dates = ['deleted_at'];

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
