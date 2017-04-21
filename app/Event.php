<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'events';

    protected $fillable = [
        'event_id',
        'title',
        'start_date',
        'end_date',
        'place'
    ];

    public function eventTypes(){
        return $this->belongsTo('App\EventType');

    }


}
