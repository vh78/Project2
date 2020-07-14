<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Middle extends Model
{
    protected $table = "devices_sensores";
    protected $fillable = ["dev_id", "sens_id"];
   
    public function model($dev_id, $sens_id)
    {
        return $this->belongsTo('App\Models');
       
    }



    /*return $this->model
    ->whereHas('devices', function ($query) use ($locale) {
        $query->where('locale', str_slug(trim($locale)));
    })->first();*/
}
