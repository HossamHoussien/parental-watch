<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{

    
    protected $guarded = [];

    /* protected $fillable = [
        'username', 'email', 'password',
    ]; */

    public function from(){
        return $this->belongsTo(ParentUser::class, 'from_id');
    }
    public function to(){
        return $this->belongsTo($this->to_type,  'to_id');
    }
    
}