<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Trip;
use App\Models\TripItinerary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function createTrip()
    {
        $drivers = User::where('user_type', 'Driver')->with('drivers')->get();
        return view('mainpages.create_trip', compact('drivers'));
    }

    public function storeTrip(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'destination' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'departure' => 'required',
            'budget' => 'required',
        ]);
        $trip = Trip::create([
            'user_id' => Auth::user()->id,
            'driver_id' => $request->driver,
            'departure' => $request->departure,
            'budget' => $request->budget,
            'destination' => $request->destination,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'status_by_driver' => 'pending',
        ]);
        if ($trip) {
            try{
            if (isset($request->point_of_interest)) {
                TripItinerary::create([
                    'trip_id' => $trip->id,
                    'key' => 'point_of_interest',
                    'value' => implode(',', $request->point_of_interest),
                ]);
            }
            if (isset($request->hotel)) {
                TripItinerary::create([
                    'trip_id' => $trip->id,
                    'key' => 'hotel',
                    'value' => $request->hotel,
                ]);
            }
            if (isset($request->foods)) {
                TripItinerary::create([
                    'trip_id' => $trip->id,
                    'key' => 'foods',
                    'value' => implode(',', $request->foods),
                ]);
            }

            if (isset($request->driver)) {
                TripItinerary::create([
                    'trip_id' => $trip->id,
                    'key' => 'driver',
                    'value' => $request->driver,
                ]);
            }
        }
        catch(\Exception $e)
        {
            
        }
        }
        return redirect()->route('tourist.trips')->with('success', 'Trip Created Successfully!');
    }

    public function index()
    {
        $user = Auth::user();
        $trips = $user->trips;
        return view('tourist.trips', compact('trips'));
    }

    public function view($id)
    {
        $trip = Trip::with('itineries', 'tripcom')->where('id', $id)->where('user_id', Auth::user()->id)->first();
        $trip = Trip::with('itineries', 'tripcom')->where('id', $id)->first();

        if ($trip) {
            return view('mainpages.view_trip', compact('trip'));
        }
        // }elseif($trip2){
        //     return view('mainpages.view_trip',compact('trip2'));
        // }
        else {
            abort(404);
        }
    }
    public function edit($id)
    {
        $trip = Trip::where('id', $id)->where('user_id', Auth::user()->id)->first();
        $city = auth()->user()->city;
        $user = User::where('user_type', 'Driver')->where('city', $trip->departure)->get();
        if ($trip) {
            return view('mainpages.edit_trip', compact('trip', 'user'));
        } else {
            abort(404);
        }
    }

    public function update($id, Request $request)
    {
        $trip = Trip::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if ($trip) {
            if ($trip->status_by_driver == 'rejected') {
                $rides = TripItinerary::where('key', 'driver')->where('trip_id', $trip->id)->first();
                // dd($rides);
                $rides->value = $request->driver;
                $rides->save();
            }
            Trip::where('id', $id)->update([
                'destination' => $request->destination,
                'start_date' => $request->start_date,
                'driver_id' => $request->driver,
                'end_date' => $request->end_date,
                'budget' => $request->budget,
                'status_by_driver' => $trip->status_by_driver == 'rejected' ? 'pending' : $trip->status_by_driver,
            ]);
            try
            {

          
            TripItinerary::where('trip_id', $trip->id)->where('key', 'point_of_interest')->delete();
            if (isset($request->point_of_interest)) {
                TripItinerary::create([
                    'trip_id' => $trip->id,
                    'key' => 'point_of_interest',
                    'value' => implode(',', $request->point_of_interest),
                ]);
            }
            TripItinerary::where('trip_id', $trip->id)->where('key', 'hotel')->delete();
            if (isset($request->hotel)) {
                TripItinerary::create([
                    'trip_id' => $trip->id,
                    'key' => 'hotel',
                    'value' => $request->hotel,
                ]);
            }
            TripItinerary::where('trip_id', $trip->id)->where('key', 'foods')->delete();
            if (isset($request->foods)) {
                TripItinerary::create([
                    'trip_id' => $trip->id,
                    'key' => 'foods',
                    'value' => implode(',', $request->foods),
                ]);
            }
        }
        catch(\Exception $e)
        {

        }
            return redirect()->route('tourist.trips')->with('success', 'Trip Updated Successfully!');

        } else {
            abort(404);
        }
    }

    public function delete($id)
    {
        try {
            TripItinerary::where('trip_id', $id)->delete();
            Trip::where('id', $id)->delete();
            return redirect()->route('tourist.trips')->with('success', 'Trip Deleted Successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('tourist.trips')->with('error', $th->getMessage());
        }
    }

    public function find_driver(Request $request)
    {
        $selectedCity = $request->input('city');
        $drivers = User::where('user_type', 'Driver')->where('city', $selectedCity)->with('drivers')->get();

        return response()->json(['drivers' => $drivers]);
    }

    public function ratingPage($id)
    {
        $trip = Trip::find($id);

        return view('tourist.rating', ['trip' => $trip]);
    }

    public function rate(Request $request)
    {
        $rate = new Rating();
        $rate->user_id = auth()->user()->id;
        $rate->trip_id = $request->trip_id;
        $rate->message = $request->message;
        if (isset($request->image)) {
            $image = $request->image;
            $path = $request->file('image')->store('images', 'public');
            $rate->image = asset('storage/' . $path);
        }
        $rate->save();

        return redirect()->route('tourist.trips')->with(['success' => 'Thankyou for rating us']);

    }

}
