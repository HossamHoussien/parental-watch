<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
   
    protected $namespace = 'App\Http\Controllers';

    
    public function boot()
    {
        parent::boot();
    }

    
    public function map()
    {
        
        $this->mapParentRoutes(); // Must be before root domain roots
        
        $this->mapTutorRoutes(); // Must be before root domain roots
        
        $this->mapNannyRoutes(); // Must be before root domain roots
        
        $this->mapAuthRoutes();
        
        $this->mapWebRoutes();


        
    }

    
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }
    
    protected function mapTutorRoutes()
    {
        Route::middleware('web', 'auth:tutor')
             ->namespace($this->namespace . '\Tutor')
             ->name('tutor.')
             ->group(base_path('routes/tutor.php'));
    }
    
    protected function mapParentRoutes()
    {
        Route::middleware('web', 'auth:parent')
             ->namespace($this->namespace . '\Parent')
             ->name('parent.')
             ->group(base_path('routes/parent.php'));
    }

    protected function mapNannyRoutes()
    {
        Route::middleware('web', 'auth:nanny')
             ->namespace($this->namespace . '\Nanny')
             ->name('nanny.')
             ->group(base_path('routes/nanny.php'));
    }

    
    protected function mapAuthRoutes()
    {
        Route::middleware('web')
             ->group(base_path('routes/auth.php'));
    }
}