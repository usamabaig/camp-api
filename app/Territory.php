<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Territory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'territory_name'
    ];

    public function district()
    {
        return $this->hasOne('App\District', 'id', 'district_id');
    }
}
