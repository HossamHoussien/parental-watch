<?php

namespace App\Http\Controllers\Tutor;

use App\Models\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(Request $request, Tutor $user){
        return view('common.profile', compact('user'));
    }

    
    public function edit(Request $request, Tutor $user){
        return view('common.profile-edit', compact('user'));
    }


    public function update(Request $request, Tutor $user){

        $user->update($request->except('_token'));

        return redirect()->route('tutor.profile', $user->id)->with(['status' => 'Profile has been updated']);
    }


    public function destroy(Request $request, Tutor $user){
        $user->delete();
        Auth::logout();
        return redirect()->route('tutor.home');
    }
}