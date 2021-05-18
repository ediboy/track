<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value', 'type', 'position', 'required', 'group',
    ];

    protected $casts = [
       'value' => 'array'
   ];

    // RELATIONSHIPS

    /**
     * The profiles that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User')->withPivot('value');
    }
}
