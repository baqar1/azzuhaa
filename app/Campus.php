<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campuses';
    protected $fillable = [
        'name',
        'address', 'lat', 'lng'
    ];

    public $timestamps = false;


    // Relation with ShiftTiming
    public function shiftTimings(){
        return $this->hasMany('App\ShiftTiming');
    }


    // Relation with events Album
    public function Albums(){
        return $this->hasMany('App\Album');
    }


}
