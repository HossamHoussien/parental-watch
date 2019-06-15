<?php

namespace App\Models;

use App\Models\Request as JobRequest;
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
    
    public function requests_from(){
        return $this->hasMany(JobRequest::class, 'from_id')->whereProcessed(0);
    } 
    public function requests_to(){
        return $this->hasMany(JobRequest::class, 'to_id')->whereProcessed(0);
    } 

    public function getRequestsAttribute(){
        return $this->requests_from->merge($this->requests_to);
    }
    

    
    public function hiringCount(){
        return $this->history->where('status', 1)->count();
    }
    
    public function history(){
        return $this->hasMany(History::class, 'hireable')->where('hireable_type', Tutor::class);
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