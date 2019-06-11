<?php

namespace App\Http\Controllers\Tutor;

use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Request as JobRequest;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    
   
    public function index(){
        $requests = JobRequest::whereToIdAndToType(currentUser()->id, Tutor::class)->get();

        return view('common.requests.index' ,compact('requests'));
    }

    public function store(Request $request)
    {
        $req = new JobRequest;
        $req->from_id = \currentUser()->id;
        $req->from_type = get_class(\currentUser());
        
        $req->to_id = $request->to_id;
        $req->to_type = $request->to_type;
        
        $req->save();
        return redirect()->back();
                        
    }


    
}