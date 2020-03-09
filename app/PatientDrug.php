<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientDrug extends Model
{
    public function patients()
    {
        return $this->belongsTo('App\Patient');
    }
}
