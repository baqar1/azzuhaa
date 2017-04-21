<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

    protected $fillable = [
        'album_id', 'image'
    ];

    public $timestamps = false;

    public function Album(){
        return $this->belongsTo('App\Album');
    }
}
