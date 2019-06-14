<?php

namespace App\Models;

use App\Models\Request as JobRequest;
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
    
    public function requests(){
        return $this->hasMany(JobRequest::class, 'from_id')->whereProcessed(0);
    } 

    public function hasRequest($hired){
        return JobRequest::where([
            'from_id' => $this->id,
            'to_id' => $hired->id,
            'from_type' => get_class($this),
            'to_type' => get_class($hired),
            'processed' => 0 
        ])->exists();
    }

    
    
}