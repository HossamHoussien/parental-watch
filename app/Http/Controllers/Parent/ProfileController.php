<?php

namespace App\Http\Controllers\Parent;

use App\Models\Nanny;
use App\Models\Tutor;
use App\Models\ParentUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function nanny(Nanny $user){
        return view('common.profile', compact('user'));
    }
    
    public function tutor(Tutor $user){
        return view('common.profile', compact('user'));
    }
    
    public function update(Request $request){
        $parent = currentUser();

        $parent->update($request->except('_token'));

        return redirect()->route('parent.profile')->with(['status' => 'Profile has been updated']);
    }

    
    public function destroy(ParentUser $parent){
        $parent->delete();
        Auth::logout();
        return redirect()->route('parent.home');
    }
}