<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use Collection;

class TripController extends Controller
{
    public function home()
    {
        $client = new Client(["base_uri" => "http://localhost:3000"]);

        $response = $client->request("GET", "/guest/trips", [
            "headers" => ["Authorization" => Session::get("token")],
        ]);

        $result = json_decode($response->getBody());
        
        $vehicles = $result->vehicles;
        $trips = $result->trips;
        $categories = $result->categories;

        return view("index", compact('vehicles', 'trips', 'categories'));
    }
    

    public function search(Request $request)
    {   

        $rules = array(
            "origin" => "required",
            "destination" => "required",
            "startDate" => "required",
            "quantity" => "required|numeric",
        );

        $this->validate($request, $rules);
        $client = new Client(["base_uri" => "http://localhost:3000"]);

        $response = $client->request("POST", "/guest/trips/search", [
            "headers" => ["Authorization" => Session::get("token")],
            "json" => [
                "origin" =>$request->origin,
                "destination" => $request->destination,
                "startDate" => $request->startDate,
                "quantity" => $request->endDate
            ]
        ]);

        $result = json_decode($response->getBody());

        $trips = $result->trips;

        $quantity = $request->quantity;
        $startDate = $request->startDate;
        $origin = $request->origin;
        $destination = $request->destination;

        return view("nonAdmin.trips_index", compact('trips', 'quantity', 'startDate', 'origin', 'destination'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client(["base_uri" => "http://localhost:3000"]);

        $response = $client->request("GET", "/admin/trips", [
            "headers" => ["Authorization" => Session::get("token")],
        ]);


        $result = json_decode($response->getBody());
        
        $vehicles = $result->vehicles;
        $trips = $result->trips;
        $categories = $result->categories;

        return view("admin.trips_index", compact('vehicles', 'trips', 'categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $rules = array(
            "vehicleId" => "required",
            "price" => "required|numeric",
            "origin" => "required",
            "destination" => "required",
            "startDate" => "required",
            "endDate" => "required",
        );

        // dd($request);
        $this->validate($request, $rules);

        $client = new Client(["base_uri" => "http://localhost:3000"]);

        $response = $client->request("POST", "/admin/trips", [
            "headers" => ["Authorization" => Session::get("token")],
            "json" => [
                "vehicleId" => $request->vehicleId,
                "price" => $request->price,
                "origin" =>$request->origin,
                "destination" => $request->destination,
                "startDate" => $request->startDate,
                "endDate" => $request->endDate
            ]
        ]);

        $result = json_decode($response->getBody());
        
        return redirect("/trips");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new Client(["base_uri" => "http://localhost:3000"]);

        $response = $client->request("GET", "/admin/trips/".$id, [
            "headers" => ["Authorization" => Session::get("token")],
        ]);

        $result = json_decode($response->getBody());

        $vehicle = $result->vehicle;
        $trip = $result->trip;
        $vehicles= $result->fleet;


        return view("admin.trip_edit", compact('vehicles','vehicle', 'trip'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $rules = array(
            "vehicleId" => "required",
            "price" => "required|numeric",
            "origin" => "required",
            "destination" => "required",
            "startDate" => "required",
            "endDate" => "required",
        );

        $this->validate($request, $rules);

        $client = new Client(["base_uri" => "http://localhost:3000"]);

        $response = $client->request("PUT", "/admin/trips", [
            "headers" => ["Authorization" => Session::get("token")],
            "json" => [
                "vehicleId" => $request->vehicleId,
                "price" => $request->price,
                "origin" =>$request->origin,
                "destination" => $request->destination,
                "startDate" => $request->startDate,
                "endDate" => $request->endDate
            ]
        ]);

        $result = json_decode($response->getBody());
        
        return redirect("/trips");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}


