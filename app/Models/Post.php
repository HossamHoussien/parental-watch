<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function owner(){
        return $this->belongsTo($this->user_type, 'user_id');
    }
}