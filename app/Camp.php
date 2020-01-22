<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Camp extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
