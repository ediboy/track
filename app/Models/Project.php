<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $table = 'projects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description'
    ];

    // RELATIONSHIPS

    /**
     * Get all of the users that are assigned this project.
     */
    public function users()
    {
        return $this->morphedByMany('User', 'projectable');
    }

    /**
     * Get all of the teams that are assigned this project.
     */
    public function teams()
    {
        return $this->morphedByMany('Team', 'projectable');
    }
}
