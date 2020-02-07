<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function camps()
    {
        return $this->hasOne('App\Camp', 'id', 'camp_id');
    }
}
