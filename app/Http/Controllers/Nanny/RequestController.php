<?php

namespace App\Http\Controllers\Nanny;

use App\Models\Nanny;
use App\Models\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Request as JobRequest;
use Illuminate\Support\Facades\Validator;

class RequestController extends Controller
{
    
   
    public function index(){
        $requests = JobRequest::whereToIdAndToType(currentUser()->id, Nanny::class)->get();
        return view('common.requests.index' ,compact('requests'));
    }

    public function accept(Request $request, JobRequest $id){

        $jobRequest = $id;
        $jobRequest->processed = 1;
        $jobRequest->save();

        $from = $jobRequest->from;
        $to = $jobRequest->to;

        if ($from->guard == 'parent'){
            $history = new History;
            $history->parent = $from->id;
            $history->hireable = $to->id;
            $history->hireable_type = get_class($to);
            $history->status = 1;
            $history->save();
            
        }
        
        return redirect()->route('nanny.home');
    }
    
    public function decline(Request $request, JobRequest $id){

        $jobRequest = $id;
        $jobRequest->processed = 1;
        $jobRequest->save();

        $from = $jobRequest->from;
        $to = $jobRequest->to;

        if ($from->guard == 'parent'){
            $history = new History;
            $history->parent = $from->id;
            $history->hireable = $to->id;
            $history->hireable_type = get_class($to);
            $history->status = 0;
            $history->save();
            
        }
        return redirect()->route('nanny.home');

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