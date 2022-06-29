<?php

namespace App\Models\Example;

use App\Models\User;
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
     * get person by id without pagination, without sort
     */
    public function person($id)
    {
        return Person::find($id);
    }

    /** display the people - static view*/
    public static function view()
    {
        $people = Person::all();
        return view('debug.person', compact('people'));
    }

    // TODO use static??
    /** Scope: Select which has only one image TODO - wie macht man das?
     * using: ::hasOneImage
     */
    // public function scopeHasOneImage($query)
    // {
    //     dd($query);
    //     $number = Image::where('person_id', '=', $id)->count();
    //     return $number;
    // }

    /** Count number of Images a person has
     * @return number Amount Anzahl Bilder
     */
    public function countRelatedImages($id)
    {
        return Image::where('person_id', '=', $id)->count();
    }
    
    /** Get all Images related to a person
     * @return Image Images of a person
     */
    public function getRelatedImages($id)
    {
        return Image::where('person_id', '=', $id)->get();
    }

    /**
     * Relationship: get user that owns person
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function test(){
    //     return $this->hasM
    // }

    /**
     * Relationship: get images associated with person
     */
    public function image()
    {
        return $this->hasMany(Image::class);
    }

    /** Example Function to get a value as method */
    public static function username()
    {
        return Person::select('username')->get();
    }
}
