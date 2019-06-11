<?php

namespace App\Http\Controllers\Parent;

use App\Models\Child;
use App\Models\History;
use App\Models\ParentUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ChildrenController extends Controller
{
    
   


    public function store(Request $request)
    {
        Child::create( \array_merge(['parent_id' => currentUser()->id],$request->except('_token') ));

        
        return redirect()->back()->with(['status' => 'Child has been added']);
                        
    }


    
}