<?php

namespace App\Http\Controllers\Parent;

use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Request as JobRequest;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    
    public function accept(Request $request, JobRequest $id){

        $jobRequest = $id;
        $jobRequest->processed = 1;
        $jobRequest->save();

        $from = $jobRequest->from;
        $to = $jobRequest->to;

        if ($to->guard == 'parent'){
            $history = new History;
            $history->parent = $to->id;
            $history->hireable = $from->id;
            $history->hireable_type = get_class($from);
            $history->status = 1;
            $history->by_parent = 1;
            $history->save();
            
        }
        
        return redirect()->route('parent.home');
    }
    
    public function decline(Request $request, JobRequest $id){
        
        $jobRequest = $id;
        $jobRequest->processed = 1;
        $jobRequest->save();

        $from = $jobRequest->from;
        $to = $jobRequest->to;

        if ($to->guard == 'parent'){
            $history = new History;
            $history->parent = $to->id;
            $history->hireable = $from->id;
            $history->hireable_type = get_class($from);
            $history->status = 0;
            $history->by_parent = 1;

            $history->save();
            
        }
        
        return redirect()->route('parent.home');

    }


    public function store(Request $request)
    {
        $req = new JobRequest;
        $req->from_id = \currentUser()->id;
        $req->from_type = get_class(\currentUser());
        
        $req->to_id = $request->to_id;
        $req->to_type = $request->to_type;
        
        $req->save();
        if ($request->ajax()){
            return response()->json(['message' => 'Request has been sent'], 200);
        }
             
     return redirect()->back();
    }


    
}