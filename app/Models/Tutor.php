<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Tutor extends Authenticatable
{
    use Notifiable;
    protected $guard = "tutor";

    
    protected $guarded = [];
    
   /*  protected $fillable = [
        'username', 'email', 'password'
    ]; */
     
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

 
    public function gender(){
        return $this->gender == "m" ? 'Male' : 'Female';
    }
    
    public function profile(){
        return route('tutor.profile', $this->id);
    }
    
    public function age(){
        return $this->age . " Years old";
    }
    
    public function getClassNameAttribute(){
        return self::class;
    }

    public function getGuardAttribute(){
        return 'tutor';
    }
}