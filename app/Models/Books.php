<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    function authors()
    {
        return $this->hasMany();
    }
}
