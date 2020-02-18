<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cnic', 'designation', 'employee_code', 'mobile_no', 'email', 'password', 'territory', 'district'
        , 'region', 'team'
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

    public function user_territory()
    {
        return $this->hasOne('App\Territory', 'id', 'territory');
    }

    public function user_district()
    {
        return $this->hasOne('App\District', 'id', 'district');
    }

    public function user_region()
    {
        return $this->hasOne('App\Region', 'id', 'region');
    }

    public function user_team()
    {
        return $this->hasOne('App\Team', 'id', 'team');
    }

    public function user_role()
    {
        return $this->hasOne('App\Role', 'id', 'designation');
    }
}
