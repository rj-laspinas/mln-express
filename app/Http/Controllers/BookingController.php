<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
        $amount = "₱ ". $quantity * $price;

        Session::put("tripId", $tripId);
        Session::put("quantity", $quantity);
        Session::put("price", $price);
        Session::put("amount", $amount);

        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        if(Session::get("user") !== null){ 

            if(Session::get("user")->isAdmin == false){
                $response = $client->request("GET", "/guest/trips/".$tripId, [
                    "headers" => ["Authorization" => Session::get("token")],
                ]);

                $result = json_decode($response->getBody());
                $vehicle = $result->vehicle;
                $trip = $result->trip;

            return view('nonAdmin.booking_summary', compact('tripId', 'quantity', 'price', 'amount', 'vehicle', 'trip'));

            } else {

                return redirect("/");

            }

        /*REDIRECT TO GUEST DETAILS PAGE*/
        } else {

            $response = $client->request("GET", "/guest/trips/".$tripId);

            $result = json_decode($response->getBody());

            $trip = $result->trip;


        return view("guest.booking", compact('trip','quantity'));    
        }
    }

    public function guestsummary(Request $request)
    
    {   
        $fname = $request->fname;
        $lname = $request->lname;
        $mobile = $request->mobile;
        $email = $request->email;


         $rules = array(
            "fname" => "required",
            "lname" => "required",
            "mobile" => "required",
            "email" => "required"
        );

        $this->validate($request, $rules);

        Session::put("fname", $request->fname);
        Session::put("lname", $request->lname);
        Session::put("mobile", $request->mobile);
        Session::put("email", $request->email);

        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);


        $response = $client->request("GET", "/guest/trips/".Session::get('tripId'), [
                "headers" => ["Authorization" => Session::get("token")],
            ]);

            $result = json_decode($response->getBody());
            $vehicle = $result->vehicle;
            $trip = $result->trip;

        return view('guest.booking_summary', compact('vehicle', 'trip'));
    }

    public function createGuest(Request $request) 

    {
        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("POST", "/guest/bookings", [
            "headers" => ["Authorization" => Session::get("token")],
            "json" => [
                "quantity" => Session::get("quantity"),
                "price" => Session::get("price"),
                "tripId" => Session::get("tripId"),
                "fname" => Session::get("fname"),
                "lname" => Session::get("lname"),
                "mobile" => Session::get("mobile"),
                "email"  => Session::get("email"),
            ]
        ]);

        $result = json_decode($response->getBody());

        $booking = $result->booking;
        $trip = $result->trip;
        $vehicle = $result->vehicle;
        $user = $result->user;

        return view("guest.ticket", compact('booking', 'trip', 'vehicle', 'user'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);
        // $client = new Client(["base_uri" => "localhost:3000"]);

        $response = $client->request("GET", "/nonAdmin/bookings", [
            "headers" => ["Authorization" => Session::get("token")],
        ]);


        $result = json_decode($response->getBody());
        $vehicles = $result->vehicles;
        $trips = $result->trips;
        $bookings = $result->bookings;

        return view("nonAdmin.booking_index", compact('vehicles', 'trips', 'bookings'));
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

        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("POST", "/nonAdmin/bookings", [
            "headers" => ["Authorization" => Session::get("token")],
            "json" => [
                "quantity" => $request->quantity,
                "price" => $request->price,
                "tripId" =>$request->tripId,
            ]
        ]);

        $result = json_decode($response->getBody());
        
        $booking = $result->booking;
        $trip = $result->trip;
        $vehicle = $result->vehicle;
        $referenceNo = Str::limit($booking->_id, 7);
        $tripRef = Str::limit($trip->_id, 6);


        // dd($referenceNo);


        return view("nonAdmin.ticket",compact('trip', 'booking', 'vehicle', 'referenceNo', 'tripRef'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("DELETE", "/nonAdmin/bookings/".$id, [
            "headers" => ["Authorization" => Session::get("token")],
        ]);


        $result = json_decode($response->getBody());
        // dd($result);
        $vehicle = $result->vehicle;
        $trip = $result->trip;
        $booking = $result->booking;
        $referenceNo = Str::limit($booking->_id, 7);
        $tripRef = Str::limit($trip->_id, 6);

        // dd($referenceNo);

        return view("nonAdmin.ticket",compact('trip', 'booking', 'vehicle', 'referenceNo', 'tripRef'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("DELETE", "/nonAdmin/bookings/".$id, [
            "headers" => ["Authorization" => Session::get("token")],
        ]);


        $result = json_decode($response->getBody());
        // dd($result);
        $vehicle = $result->vehicle;
        $trip = $result->trip;
        $booking = $result->booking;
        $referenceNo = Str::limit($booking->_id, 7);
        $tripRef = Str::limit($trip->_id, 6);


        // dd($referenceNo);


        return view("nonAdmin.ticket",compact('trip', 'booking', 'vehicle', 'referenceNo', 'tripRef'));
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
        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("DELETE", "/nonAdmin/bookings/".$id, [
            "headers" => ["Authorization" => Session::get("token")],
        ]);


        $result = json_decode($response->getBody());


        return redirect('/bookings');
    }


    public function adminIndex()
    {
        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("GET", "/admin/bookings", [
            "headers" => ["Authorization" => Session::get("token")],
        ]);


        $result = json_decode($response->getBody());
        $vehicles = $result->vehicles;
        $trips = $result->trips;
        $bookings = $result->bookings;

        return view("admin.booking_index", compact('vehicles', 'trips', 'bookings'));
    }
}
