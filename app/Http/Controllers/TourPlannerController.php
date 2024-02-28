<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TourPlannerController extends Controller
{
    public function index()
    {
        return view('tour_planner.index');
    }

    public function planTour(Request $request)
    {
        $origin = $request->input('origin');
        $destination = $request->input('destination');

        // Use Google Directions API to get directions
        $directions = $this->getDirectionsFromGoogle(
            $origin,
            $destination
        );

        return view('tour_planner.results', [
            'directions' => $directions,
        ]);
    }

    private function getDirectionsFromGoogle($origin, $destination)
    {
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/directions/json', [
            'query' => [
                'key' => 'AIzaSyDDs_GJ-jYuHEQI7Gp0SmiqozELvV9mSsY',
                'origin' => $origin,
                'destination' => $destination,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

   

    }

