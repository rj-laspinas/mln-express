<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class BookingController extends Controller
{
    public function summary(Request $request)
    {
        $tripId = $request->tripId;
        $quantity = $request->quantity;
        $price = $request->price;
        $amount = $quantity * $price;

        $client = new Client(["base_uri" => "http://localhost:3000"]);

        $response = $client->request("GET", "/guest/trips/".$tripId, [
            "headers" => ["Authorization" => Session::get("token")],
        ]);

        $result = json_decode($response->getBody());

        // dd($result);
        $vehicle = $result->vehicle;
        $trip = $result->trip;

        return view('nonAdmin.booking_summary', compact('tripId', 'quantity', 'price', 'amount', 'vehicle', 'trip'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // dd($request);

         $rules = array(
            "quantity" => "required",
            "price" => "required|numeric",
            "tripId" => "required",
        );

        $this->validate($request, $rules);

        $client = new Client(["base_uri" => "http://localhost:3000"]);

        $response = $client->request("POST", "/nonAdmin/bookings", [
            "headers" => ["Authorization" => Session::get("token")],
            "json" => [
                "quantity" => $request->quantity,
                "price" => $request->price,
                "tripId" =>$request->tripId,
            ]
        ]);

        $result = json_decode($response->getBody());
        

        dd($result);
        return view("ticket",compact('trip'));
    }
    public function ticket()
    {
        return view('ticket', compact());    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
