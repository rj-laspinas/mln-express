<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use GuzzleHttp\Exception\BadResponseException;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        if(Session::get("user")->isAdmin = true ) {
            $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

            $response = $client->request("GET", "/admin/vehicles", [
                "headers" => ["Authorization" => Session::get("token")],
            ]);

            $result = json_decode($response->getBody());
            // dd($result);
            $vehicles = $result->vehicles;
            $categories = $result->categories;
            $locations = $result->locations;

            return view("admin.vehicles_index", compact('vehicles', 'categories', 'locations'));
        } else {
            return redirect("/");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function options()
    {

        if(Session::get("user")->isAdmin = true ) {
            $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

            $response = $client->request("GET", "/admin/vehicles", [
                "headers" => ["Authorization" => Session::get("token")],
            ]);

            $result = json_decode($response->getBody());
            // dd($result);
            $vehicles = $result->vehicles;
            $categories = $result->categories;
            $locations = $result->locations;

            return view("admin.options", compact('vehicles', 'categories', 'locations'));
        } else {
            return redirect("/");
        }    
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
            "category" => "required",
            "vehicleType" => "required",
            "vehicleModel" => "required",
            "plate" => "required",
            "seatingCap" => "required|numeric",
            // "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        );

        // dd($request);
        $this->validate($request, $rules);
        // $image = $request->file('image');
        // $image_name = time(). "." . $image->getClientOriginalExtension();
        // $destination = "images/";
        // $image->move($destination, $image_name);
        // $img_path = $destination.$image_name;

        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("POST", "/admin/vehicles", [
            "headers" => ["Authorization" => Session::get("token")],
            "json" => [
                "category" => $request->category,
                "vehicleType" => $request->vehicleType,
                "vehicleModel" => $request->vehicleModel,
                "plate" => $request->plate,
                // "image" => $img_path,
                "seatingCap" => $request->seatingCap
            ]
        ]);

        $result = json_decode($response->getBody());
        
        return redirect("/vehicles");
    }

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
        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("GET", "/admin/vehicles/".$id, [
            "headers" => ["Authorization" => Session::get("token")],
        ]);

        $result = json_decode($response->getBody());

        // dd($result);
        $vehicle = $result->vehicle;
        $categories = $result->categories;
        $trips = $result->trips;


        return view("admin.vehicle_edit", compact('vehicle', 'categories', 'trips'));
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
            "category" => "required",
            "vehicleType" => "required",
            "vehicleModel" => "required",
            "plate" => "required",
            "seatingCap" => "required|numeric",
            // "image" => "required|image|mimes:jpeg,png,jpg,gif,svg|max:2048"
        );

        // dd($request);
        $this->validate($request, $rules);
        // $image = $request->file('image');
        // $image_name = time(). "." . $image->getClientOriginalExtension();
        // $destination = "images/";
        // $image->move($destination, $image_name);
        // $img_path = $destination.$image_name;

        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("PUT", "/admin/vehicles/".$id, [
            "headers" => ["Authorization" => Session::get("token")],
            "json" => [
                "category" => $request->category,
                "vehicleType" => $request->vehicleType,
                "vehicleModel" => $request->vehicleModel,
                "plate" => $request->plate,
                // "image" => $img_path,
                "seatingCap" => $request->seatingCap
            ]
        ]);

        $result = json_decode($response->getBody());
        
        return redirect("/vehicles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        // $client = new Client(["base_uri" => "http://localhost:3000"]);

        // $response = $client->request("GET", "/admin/vehicle/status/".$id, [
        //     "headers" => ["Authorization" => Session::get("token")],
        // ]);

        // $result = json_decode($response->getBody());
        
        // return redirect("/vehicles");
    }

        public function service($id)
    {
        // dd($id);
        $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

        $response = $client->request("DELETE", "/admin/vehicles/status/".$id, [
            "headers" => ["Authorization" => Session::get("token")],
        ]);

        $result = json_decode($response->getBody());
        
        // dd($result);
        return redirect("/vehicles");
    }
}
