<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ParentUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'parents';
    protected $guard = "parent";
    
    protected $guarded = [];

    /* protected $fillable = [
        'username', 'email', 'password',
    ]; */


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function history(){
        return $this->hasMany(History::class, 'parent');
    }
    
    public function children(){
        return $this->hasMany(Child::class, 'parent_id');
    }
    
    public function gender(){
        return $this->gender == "m" ? 'Male' : 'Female';
    }
    
    public function age(){
        return $this->age . " Years old";
    }
    
    public function nanniesHiringCount(){
        return $this->history->where('hireable_type', Nanny::class)->count();
    }
    public function tutorsHiringCount(){
        return $this->history->where('hireable_type', Tutor::class)->count();
    }
    
    public function getGuardAttribute(){
        return 'parent';
    }
    
}