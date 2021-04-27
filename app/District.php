<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'district_name'
    ];

    public function region()
    {
        return $this->hasOne('App\Region', 'id', 'region_id');
    }
}
