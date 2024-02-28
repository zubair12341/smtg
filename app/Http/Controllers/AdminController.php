<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AdminController extends Controller
{
    public function dashboard()
    {
        $total_users = User::where('user_type', '!=', 'Admin')->count();
        $tourists = User::where('user_type', '=', 'Tourist')->count();
        $drivers = User::where('user_type', '=', 'Driver')->count();
        $all = User::orderBy('id', 'desc')->where('user_type', '!=', 'Admin')->take(5)->get();

     
        $plans = Trip::all()->count();

        $trips_count = Trip::all()->count();
        // dd($trips_count);
        // dd($total_users);
        return view('admin.dashboard', compact('total_users', 'tourists', 'drivers', 'all', 'trips_count','plans'));
    }

    public function users()
    {
        $total_users = User::where('user_type', '!=', 'Admin')->count();
        $tourists = User::where('user_type', '=', 'Tourist')->count();
        $drivers = User::where('user_type', '=', 'Driver')->count();
        $all = User::orderBy('id', 'desc')->where('user_type', '!=', 'Admin')->get();
        return view('admin.users', compact('all', 'total_users', 'tourists', 'drivers'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->input('password')),
            ]);
        }

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with(['success' => 'User deleted successfully']);
    }

    public function all_plans()
    {
        $trips = Trip::all();
        // dd($trips);
        return view('admin.trips', compact('trips'));
    }

    public function view_trip($id)
    {

        $trip = Trip::where('id', $id)->first();
        if ($trip) {
            return view('admin.view_trip', compact('trip'));
        } else {
            abort(404);
        }
    }

    public function reports()
    {
        $tourists = User::where('user_type', 'Tourist')->count();
        $drivers = User::where('user_type', 'Driver')->count();
        $plans = Trip::all()->count();

        return view('admin.reports', compact('tourists', 'drivers', 'plans'));
    }

    public function complain()
    {
        $comp = Complain::all();

        return view('admin.complain', ['complain' => $comp]);
    }

    public function enableUser($id)
    {
        $user = User::find($id);
        if ($user) {
            if ($user->status == 0) {
                $user->status = 1;

            } else {
                $user->status = 0;
            }
            $user->save();
            return redirect()->back()->with(['success' => 'Status changed successfully']);
        } else {
            return redirect()->back()->with(['error' => 'User Not Found']);
        }
    }
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        // dd('dd');
        $user_social = Socialite::driver('google')->user();

        $users = User::where(['email' => $user_social->getEmail()])->first();

        if ($users) {
            Auth::login($users);
            $userType = Auth::user()->user_type;

            switch ($userType) {
                case 'Admin':
                    return redirect('admin/dashboard');
                case 'Hotel':
                    return redirect('/hotel/vendor/dashboard');
                case 'Tourist':
                    return redirect('/');
                case 'Driver':
                    return redirect('/driver/vendor/dashboard');
                default:
                    return redirect('/');
            }
        } else {

            $userData = [
                'name' => $user_social->getName(),
                'email' => $user_social->getEmail(),
                'image' => $user_social->getAvatar(),
                'user_type' => 'Tourist',
                'provider_id' => $user_social->getId(),
                'provider' => 'google',
            ];

            session(['userData' => $userData]);

            return redirect('/register');
            // Auth::login($user);

            //    Auth::login($user);
            //    $userType = Auth::user()->user_type;

            //    switch ($userType) {
            //        case 'Admin':
            //           return redirect('admin/dashboard');
            //        case 'Hotel':
            //           return redirect('/hotel/vendor/dashboard');
            //        case 'Tourist':
            //           return redirect('/');
            //        case 'Driver':
            //           return redirect('/driver/vendor/dashboard');
            //        default:
            //           return redirect('/');
            //    }
        }
    }

    public function forgotPage()
    {
        return view('auth.forgot');
    }

    public function reset(Request $request)
    {

        $validate = $request->validate([
            'email' => 'required|exists:users',
            'phone' => 'required|exists:users',
        ]);

        $user = User::where('email', $request->email)->first();

        return redirect()->route('password.page', $user->id);

    }

    public function newPassPage($id)
    {
        $user = User::find($id);

        return view('auth.newpassword', ['user' => $user]);
    }

    public function newPassword(Request $request)
    {
        $validate = $request->validate([
            'password' => 'required|min:8',
            'password2' => 'required|same:password',
        ]);
        $user = User::find($request->user_id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/');
    }
}
