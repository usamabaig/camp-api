<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  \Illuminate\Database\Eloquent\Builder  $user_id
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCamps($query, $user_id)
    {
        $role_level_0 = [1,2]; // can see all data
        $role_level_1 = [3,4,5,6,7]; // Team based
        $role_level_2 = [8,9]; // Region based
        $role_level_3 = [10,11]; // District based
        $role_level_4 = [12,13,14]; // Territory based
        $role = User::where('id', $user_id)->first();
        if ($role->is_multiple_teams == 0) {
            $query->where('team', $role->team);
        }
        if (in_array($role->designation, $role_level_0)) {

            return $query;
        } else if(in_array($role->designation, $role_level_1)) {
            $user_ids = User::where('team', $role->team)->pluck('id')->toArray();

            return $query->whereIn('user_id', $user_ids);
        } else if(in_array($role->designation, $role_level_2)) {
            $user_ids = User::where('region', $role->region)->pluck('id')->toArray();

            return $query->whereIn('user_id', $user_ids);
        } else if(in_array($role->designation, $role_level_3)) {
            $user_ids = User::where('district', $role->district)->pluck('id')->toArray();

            return $query->whereIn('user_id', $user_ids);
        } else if(in_array($role->designation, $role_level_4)) {
            $user_ids = User::where('territory', $role->territory)->pluck('id')->toArray();

            return $query->whereIn('user_id', $user_ids);
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
