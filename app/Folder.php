<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    protected $table = 'folders';

    protected $fillable = [ 'name' ];

    public $timestamps = false;


    public function AudioFiles(){
        return $this->hasMany('App\AudioFile');
    }
}
