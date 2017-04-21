<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AudioFile extends Model
{
    protected $table = 'audio_files';

    protected $fillable = [
        'folder_id', 'path', 'name'
    ];

    public $timestamps = false;

    public function Folder(){
        return $this->belongsTo('App\Folder');
    }
    
}
