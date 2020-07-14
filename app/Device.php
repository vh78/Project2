<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $table = "devices";
    protected $fillable = ["name", "params"];


    public function middle() {
        return $this->hasMany("App\Middle");
    }

    public function sensor() {
        return $this->belongsTo("App\Sensor", 'sensor_id');
    }


}
