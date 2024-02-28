<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\User;

class PasswordController extends Controller
{
    public function showChangeForm()
    {
        return view('admin.changepass');
    }

    public function updateP(Request $request)
{
    $user = Auth::user();
    
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
        'country' => ['required', 'string', 'max:255'],
        'city' => ['required', 'string', 'max:255'],
        'state' => ['required', 'string', 'max:255'],
        'phone' => ['required', 'string', 'max:255'],
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'country' => $request->country,
        'city' => $request->city,
        'state' => $request->state,
        'phone' => $request->phone,
    ]);

    if(isset($request->image))
    {
     
        $image = $request->file('image');
        $path = $image->store('images', 'public');
        $user->image = asset('storage/' . $path);
        $user->save();
    }

    return redirect()->back()->with(['success' => 'Profile updated successfully!']);
}

    

    public function update(Request $request)
    {
        // $request->validate([
        //     'current_password' => ['required', 'password'],
        //     'new_password' => ['required', 'min:8', 'confirmed'],
        // ]);

        $user = Auth::user();
        $user->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with(['success' => 'Password changed successfully!']);
    }
}
