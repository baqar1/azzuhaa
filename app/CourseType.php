<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseType extends Model
{
    protected $table = 'course_types';

    protected $fillable = [ 'name' ];

    public $timestamps = false;

    public function courses(){
        return $this->hasMany('App\Course');
    }
}
