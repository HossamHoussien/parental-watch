<?php

namespace App\Http\Controllers\Parent;

use App\Models\History;
use App\Models\ParentUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class HireController extends Controller
{
    
   


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|string',
            'hireable_id' => 'required|string',
        ]);
        
         if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $history = new History;
        $history->parent = currentUser()->id;
        $history->hireable = $request->hireable_id;
        $history->hireable_type = $request->type;
        $history->save();
        
        $hired = $request->type::find($request->hireable_id);
        
        $hired->hireCount = $hired->hireCount + 1;
        $hired->save();
        
        return redirect()->back();
                        
    }


    
}