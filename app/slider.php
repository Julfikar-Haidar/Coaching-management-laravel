<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
    protected $fillable = [
        'slide_image', 'slide_title', 'slide_description','slide_status',
    ];
}
