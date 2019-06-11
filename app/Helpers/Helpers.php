<?php

if (!function_exists('subdomain')){
    function subdomain(){

        $appName = env('APP_URL');

        $url = url()->current();

        $url = str_replace('http://', '', $url);
        
        $url = explode('.', $url);

        $url = $url[0] ?? null;
        
        return $url;
    }
}

if (!function_exists('currentUser')){
    function currentUser(){
        $user = auth('parent')->user() ?? auth('nanny')->user() ?? auth('tutor')->user() ?? null;
        return $user;
    }
}


if (!function_exists('currentGuard')){
    function currentGuard(){
        $gurad = null;
        if (auth('parent')->check()){
            $guard = 'parent';
        }
        elseif (auth('nanny')->check()){
            $guard = 'nanny';
        }
        elseif (auth('tutor')->check()){
            $guard = 'tutor';
        }
        
        return $guard;
    }
}


if (!function_exists('avatar')){
    function avatar($user){
        return $user->avatar ??  '/images/default-' . $user->gender . '.png' ;
    }
}


if (!function_exists('profile')){
    function profile($user){
        return $user->avatar ??  '/images/default-' . $user->gender . '.png' ;
    }
}