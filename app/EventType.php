<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    protected  $table = "event_types";

    protected  $fillable = [ 'event_name'];


    public function events(){

        return $this->hasMany('App\Event');
    }

}
