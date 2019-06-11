<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $guarded = [];
    
    public function gender(){
        return $this->gender == "m" ? 'Male' : 'Female';
    }
    
    public function age(){
        return $this->age . " Years old";
    }
    
    public function has_disability(){
        return $this->has_disability ? "Yes" : "No";
    }
}