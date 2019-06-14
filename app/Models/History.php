<?php

namespace App\Models;

use App\Models\ParentUser;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function hired(){
        return $this->belongsTo($this->hireable_type, 'hireable');
    }
    public function sender(){
        return $this->belongsTo(ParentUser::class, 'parent');
    }
}