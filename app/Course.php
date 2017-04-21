<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'course_type_id', 'name',
        'description'
    ];

    public $timestamps = false;

    public function courseTypes(){

        return $this->belongsTo('App\CourseType');
    }
}
