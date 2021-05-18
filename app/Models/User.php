<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasRoles;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname', 'lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['fullname'];

    // RELATIONSHIPS

    /**
     * The profiles that belong to the user.
     */
    public function profiles()
    {
        return $this->belongsToMany('Profile')->withPivot('value');
    }

    /**
     * The teams that belong to the user.
     */
    public function teams()
    {
        return $this->belongsToMany('Team');
    }

    /**
     * Get all of the projects for the user.
     */
    public function projects()
    {
        return $this->morphToMany('Project', 'projectable');
    }

    // ATTRIBUTES

    /**
     * Return the full name of user
     *
     * @return string
     */
    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }


    /**
     * Return the reverse full name of user
     *
     * @return string
     */
    public function getReverseFullnameAttribute()
    {
        return $this->lastname . ', ' . $this->firstname;
    }
}
