<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headerfooter extends Model
{
   protected $fillable = [
        'owner_name', 'owner_dept', 'owner_mobile','address','copyright','status',
    ];
}
