<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Trip;
use App\Models\TripComment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TouristController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $trips = $user->trips;
        $mytrip_count = $user->trips->count();

        $currentYear = Carbon::now()->year;

        $year = 'Sales ' . $currentYear;
        $currentMonth = Carbon::now()->month;
        $trip_jan = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 1)
            ->get();

        $trip_feb = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 2)
            ->get();
        $trip_mar = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 3)
            ->get();
        $trip_apr = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 4)
            ->get();
        $trip_may = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 5)
            ->get();
        $trip_jun = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 6)
            ->get();
        $trip_jul = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 7)
            ->get();
        $trip_aug = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 8)
            ->get();
        $trip_sep = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 9)
            ->get();
        $trip_oct = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 10)
            ->get();
        $trip_nov = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 11)
            ->get();
        $trip_dec = Trip::where('user_id', auth()->user()->id)->whereYear('start_date', $currentYear)
            ->whereMonth('start_date', 12)
            ->get();
        // dd($mytrip_count);
        return view('tourist.dashboard', compact('trips', 'mytrip_count', 'trip_jan', 'trip_feb', 'trip_mar', 'trip_apr', 'trip_may', 'trip_jun', 'trip_jul', 'trip_aug', 'trip_sep', 'trip_oct', 'trip_nov', 'trip_dec', 'currentYear', 'year', 'currentMonth'));
    }

    public function add_comment(Request $request)
    {
        // dd($request->trip_id);

        $trip = new TripComment();
        $trip->trip_id = $request->trip_id;
        $trip->user_id = Auth::user()->id;
        $trip->comment = $request->comment;
        $trip->save();

        if ($trip) {
            return redirect()
                ->back()
                ->with('success', 'Comment Added!');

        } else {
            return redirect()
                ->back()
                ->with('error', 'Something went wrong!');
        }

    }
    public function complain($id)
    {
        $trip=Trip::find($id);
        return view('tourist.complain',['trip'=>$trip]);
    }

    public function complainStore(Request $request)
    {
        $trip=Trip::find($request->trip_id);
        //dd($trip);
        $comm=Complain::where('trip_id',$trip->id)->first();
        if($comm!=null)
        {
          
            // $comm->user_id=$trip->user_id;
            // $comm->driver_id=$trip->driver_id;
            // $comm->trip_id=$trip->id;
            $comm->message=$request->message;
            $comm->save();
        }
        else
        {
            $complain= new Complain();
            $complain->user_id=$trip->user_id;
            $complain->driver_id=$trip->driver_id;
            $complain->trip_id=$trip->id;
            $complain->message=$request->message;
            $complain->save();
        }
     

        return redirect()->route('tourist.trips');

    }

    public function completed($id)
    {
        $trip=Trip::find($id);
        $trip->status_by_driver='complete';
        $trip->save();

        return redirect()
        ->back()
        ->with('success', 'Trip Completed!');
    }
}
