<?php

namespace App\Http\Controllers\Parent;

use App\Models\Nanny;
use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    
    public function nannies()
    {
        $nannies = Nanny::all();
        $cities = $nannies->pluck('city');
        return view('parent.search.nannies', compact('nannies', 'cities'));
    }
    
    public function tutors()
    {
        $tutors = Tutor::all();
        $cities = $tutors->pluck('city');
        return view('parent.search.tutors', compact('tutors', 'cities'));
    }
}