<?php

namespace App\Http\Controllers\Nanny;

use App\Models\Nanny;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(Request $request, Nanny $user){
        return view('common.profile', compact('user'));
    }

    
    public function edit(Request $request, Nanny $user){
        return view('common.profile-edit', compact('user'));
    }


    public function update(Request $request, Nanny $user){

        $user->update($request->except('_token'));

        return redirect()->route('nanny.profile', $user->id)->with(['status' => 'Profile has been updated']);
    }


    public function destroy(Request $request, Nanny $user){
        $user->delete();
        Auth::logout();
        return redirect()->route('nanny.home');
    }
}