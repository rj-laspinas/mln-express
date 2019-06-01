<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

class AuthController extends Controller
{
    public function registerForm() {
    	return view ("register");
    }

    public function register_user(Request $request) {
        $fname = $request->fname;
        $lname = $request->lname;
        $mobile = $request->mobile;
    	$email = $request->email;
    	$password = $request->password;


    	$client = new Client(["base_uri" => "http://localhost:3000"]);

    	$response = $client->request("POST", "/register/user", [
    		"json" => [
                "fname" => $fname,
                "lname" => $lname,
                "mobile" => $mobile,
    			"email" => $email,
    			"password" => $password,
    		]
    	]);
        // dd($response);
    	$result = json_decode($response->getBody());

        // dd($result->message);

        if($result->message == "user registered successfully") {
            return redirect("/login");
        }
        return redirect("/register")->with($error);
    }

    public function loginForm () {
    	return view("login");
    }

    public function loginUser(Request $request) {
    	$email = $request->email;
    	$password = $request->password;


    	$client = new Client(["base_uri" => "http://localhost:3000"]);

    	$response = $client->request("POST", "auth/login", [
    		"json" => [
    			"email" => $email,
    			"password" => $password,
    		]
    	]);

    	$result = json_decode($response->getBody());

   		Session::put("user", $result->data->user);
   		Session::put("token", "Bearer ".$result->data->token);

        // dd(Session::get("user")->isAdmin);

        $isAdmin = $result->data->user->isAdmin;

        // dd($isAdmin);
        if($isAdmin == true) {
            return redirect("/vehicles");
        } else {
            return redirect("/bookings");
        }

    }

    public function logout() {
    	Session::flush();
    	return redirect("/login");
    }
}
