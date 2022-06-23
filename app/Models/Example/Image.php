<?php

namespace App\Models\Example;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    /** Anwendung folgend!!:
     * $completedProjects = Project::completed()->get(); */

    /**
     * Scope:  Select images that are not assigned to a person
     * @return void
     */
    public function scopeUnassigned()
    {
        return Image::where('person_id', null);
    }
    /**
     * Scope:  Select images that are assigned to a person
     * @return void
     */
    public function scopeAssigned()
    {
        return Image::where('person_id' != null);
    }

    /**
     * Relationship: get person that owns images
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
