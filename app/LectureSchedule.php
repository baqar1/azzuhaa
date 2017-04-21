<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureSchedule extends Model
{

    protected $fillable = [
        'title', 'time',
         'date', 'duration'
    ];

    public $timestamps = false;


}
