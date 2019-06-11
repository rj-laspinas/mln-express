<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::get("user") !== null) {        
            if(Session::get("user")->isAdmin == true) {

            $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

            $response = $client->request("GET", "/admin/users", [
                "headers" => ["Authorization" => Session::get("token")],
            ]);


            $users = json_decode($response->getBody());

            return view("admin.user_index", compact('users'));

            } else {
                return redirect("/login");
            }
        } else {
            return redirect("/");
        }
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
        //
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
        if(Session::get("user") !== null) {        
            if(Session::get("user")->isAdmin == true) {

            $client = new Client(["base_uri" => "https://evening-tundra-69683.herokuapp.com"]);

            $response = $client->request("DELETE", "/admin/users".$id."/admin", [
                "headers" => ["Authorization" => Session::get("token")],
            ]);


            $users = json_decode($response->getBody());

            dd($users);


            return view("admin.user_index", compact('users'));

            } else {
                return redirect("/login");
            }
        } else {
            return redirect("/");
        }    
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



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Session::get("user") !== null) {        
            if(Session::get("user")->isAdmin == true) {

            $client = new Client(["base_uri" => "localhost:3000"]);

            $response = $client->request("DELETE", "/admin/users".$id, [
                "headers" => ["Authorization" => Session::get("token")],
            ]);


            $users = json_decode($response->getBody());

            dd($users);


            return view("admin.user_index", compact('users'));

            } else {
                return redirect("/login");
            }
        } else {
            return redirect("/");
        }    
    }
}
