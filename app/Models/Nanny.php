<?php

namespace App\Models;

use App\Models\Request as JobRequest;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Nanny extends Authenticatable
{
    use Notifiable;

    protected $guard = "nanny";

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
        return route('nanny.profile', $this->id);
    }
    
    public function age(){
        return $this->age . " Years old";
    }
    
    public function getClassNameAttribute(){
        return self::class;
    }

    public function getGuardAttribute(){
        return 'nanny';
    }

    
    public function requests(){
        return $this->hasMany(JobRequest::class, 'to_id')->where('to_type', get_class($this))->whereProcessed(0);
    } 

    
    public function hiringCount(){
        return $this->history->count();
    }
    
    public function history(){
        return $this->hasMany(History::class, 'hireable')->where('hireable_type', Nanny::class);
    }

}