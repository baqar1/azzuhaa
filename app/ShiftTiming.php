<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftTiming extends Model
{
    protected $table = 'shift_timings';

    protected $fillable = [
        'campus_id', 'shift',
        'start_time', 'end_time'
    ];

    public $timestamps = false;

    public function campuses(){
        return $this->belongsTo('App\Campus');
    }
}
