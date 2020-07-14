<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $table = "sensors";
    protected $fillable = ["name", "params", "sens_id"];
 

    public function device() {
        return $this->hasMany('App\Model', 'dev_id');
    }
}
