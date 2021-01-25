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

    public function multiple_teams()
    {
        return $this->belongsToMany('App\Team');
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
        $role_level_2 = [8,9,15,16]; // Region based
        $role_level_3 = [10,11,17,18]; // District based
        $role_level_4 = [12,13,14]; // Territory based
        $role = User::where('id', $user_id)->first();

        if (in_array($role->designation, $role_level_0)) {

            return $query;
        } else if(in_array($role->designation, $role_level_1)) {
            $user_ids = User::where('team', $role->team)->pluck('id')->toArray();
            $m_user_ids = UserTeam::where('team_id', $role->team)->pluck('user_id')->toArray();
            $ids = array_unique(array_merge($m_user_ids, $user_ids));

            return $query->whereIn('id', $ids)->whereNotIn('designation', $role_level_0);
        } else if(in_array($role->designation, $role_level_2)) {
            if ($role->is_multiple_teams == 0 || $role->is_multiple_teams == null) {
                $user_ids = User::where('region', $role->region)->where('team', $role->team)->pluck('id')->toArray();

                return $query->whereIn('id', $user_ids)->whereNotIn('designation', array_merge($role_level_1, $role_level_0));
            } else {
                $team = UserTeam::where('user_id', $role->id)->pluck('team_id')->toArray();
                $user_ids = User::where('region', $role->region)->whereIn('team', $team)->pluck('id')->toArray();
                $m_user_ids = UserTeam::whereIn('team_id', $team)->pluck('user_id')->toArray();
                $user_ids_region = User::where('region', $role->region)->whereIn('id', $m_user_ids)->pluck('id')->toArray();
                $all_ids = array_merge($user_ids, array_unique($user_ids_region));

                return $query->whereIn('id', $all_ids)->whereNotIn('designation', array_merge($role_level_1, $role_level_0));
            }
        } else if(in_array($role->designation, $role_level_3)) {
            if ($role->is_multiple_teams == 0 || $role->is_multiple_teams == null) {
                $user_ids = User::where('district', $role->district)->where('team', $role->team)->pluck('id')->toArray();

                return $query->whereIn('id', $user_ids)->whereNotIn('designation', array_merge($role_level_2, $role_level_1, $role_level_0));
            } else {
                $team = UserTeam::where('user_id', $role->id)->pluck('team_id')->toArray();
                $user_ids = User::where('district', $role->district)->whereIn('team', $team)->pluck('id')->toArray();
                $m_user_ids = UserTeam::whereIn('team_id', $team)->pluck('user_id')->toArray();
                $user_ids_district = User::where('district', $role->district)->whereIn('id', $m_user_ids)->pluck('id')->toArray();
                $all_ids = array_merge($user_ids, array_unique($user_ids_district));

                return $query->whereIn('id', $all_ids)->whereNotIn('designation', array_merge($role_level_1, $role_level_0));
            }
        } else if(in_array($role->designation, $role_level_4)) {
            $user_ids = User::where('territory', $role->territory)->pluck('id')->toArray();

            return $query->whereIn('id', $user_ids)->whereNotIn('designation', array_merge($role_level_3, $role_level_2, $role_level_1, $role_level_0));
        }
    }
}
