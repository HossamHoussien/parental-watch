<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function hired(){
        return $this->belongsTo($this->hireable_type, 'hireable');
    }
}