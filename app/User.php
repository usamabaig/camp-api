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

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Database\Eloquent\Builder  $user_id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUsers($query, $user_id)
    {
        $role_level_0 = [1,2]; // can see all data
        $role_level_1 = [3,4,5,6,7]; // Team based
        $role_level_2 = [8,9]; // Region based
        $role_level_3 = [10,11]; // District based
        $role_level_4 = [12,13,14]; // Territory based
        $role = User::where('id', $user_id)->first();
        if (in_array($role->designation, $role_level_0)) {

            return $query;
        } else if(in_array($role->designation, $role_level_1)) {
            $user_ids = User::where('team', $role->team)->pluck('id')->toArray();

            return $query->whereIn('id', $user_ids);
        } else if(in_array($role->designation, $role_level_2)) {
            $user_ids = User::where('region', $role->region)->pluck('id')->toArray();

            return $query->whereIn('id', $user_ids);
        } else if(in_array($role->designation, $role_level_3)) {
            $user_ids = User::where('district', $role->district)->pluck('id')->toArray();

            return $query->whereIn('id', $user_ids);
        } else if(in_array($role->designation, $role_level_4)) {
            $user_ids = User::where('territory', $role->territory)->pluck('id')->toArray();

            return $query->whereIn('id', $user_ids);
        }
    }
}
