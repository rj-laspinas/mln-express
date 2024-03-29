<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {return view('index');
// });

Route::get('/', "TripController@home");
Route::get('/options', "VehicleController@options");

Route::get("/register", "AuthController@registerForm");

Route::post("/register", "AuthController@register_user");
Route::get("/login", "AuthController@loginForm");
Route::post("/login", "AuthController@loginUser");
Route::get("/logout", "AuthController@logout");
Route::resource("/admin/user", "UserController");
Route::get("/admin","AdminController@admin_dash");
// Route::get("/admin/createTour", "AdminController@tourForm");
// Route::post("/admin/tours", "AdminController@newTour");

Route::resource("categories","CategoryController");

Route::resource("vehicles", "VehicleController");
// Route::post("/vehicles","VehicleController@store");
// Route::get("/vehicles","VehicleController@index");
// Route::get("/vehicle/{id}","VehicleController@edit");
Route::post("/vehicle/update/{id}","VehicleController@update");
Route::delete("/vehicles/service/{id}","VehicleController@service");

Route::post("/vehicles/search","VehicleController@search");
Route::resource("locations", "LocationController");
Route::resource("trips","TripController");

// USR ROUTES
Route::post("/trips/search", "TripController@search");
Route::get("/trip","TripController@user");


Route::post("/bookings/summary","BookingController@summary");
Route::post("/bookings/guest/summary", "BookingController@guestsummary");
Route::post("/bookings/guest", "BookingController@createGuest");

Route::post("/bookings","BookingController@store");
Route::get("/bookings","BookingController@index");
Route::get("/bookings/ticket","BookingController@ticket");
Route::post("/bookings/cancel/{id}","BookingController@destroy");
Route::get("/bookings/{id}","BookingController@show");




// Route::resource("bookings","BookingController");
Route::get("/booking/search", "BookingController@search");
Route::resource("users","UserController");
Route::delete("/users/delete/{id}","UserController@destroy");
Route::get("/admin/bookings","BookingController@adminIndex");