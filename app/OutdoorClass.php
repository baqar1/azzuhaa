<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutdoorClass extends Model
{
    protected  $table = 'outdoor_classes';

    protected $fillable = [
        'class_name', 'place',
        'other_description', 'contactInfo'
    ];

    public $timestamps = false;
}
