<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {
    protected $table = 'doctor';
    protected $fillable = ['name', 'dr_id', 'dr_phone_no'];

}
