<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $table = 'albums';

    protected $fillable = [
        'campus_id', 'name', 'description', 'date'
    ];

    public $timestamps = false;


    // Relation with Photo
    public function Photos(){
        return $this->hasMany('App\Photo');
    }

    // Belongs to Campus
    public function Campus(){
        return $this->belongsTo('App\Campus');
    }

}
