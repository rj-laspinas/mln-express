@extends('layouts.app')

@section('content')


<div class="row">
	{{-- TRIP DETIALS --}}

  @if($trip->isCompleted == false && $trip->isCancelled !== false)
    	<div class="col-lg-4 col-sm-6 col-md-7">
          	<div class=" mx-3">
          		<h4>DETAILS OF SCHEDULED TRIP</h4>
                <form method="POST" action="/trips/{{$trip->_id}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="md-form my-2 mx-3">
                        <label for="category">Assign Vehicle</label>
                        <select name="category" class="form-control validate">
                            <option value="{{$tripVehicle->_id}}">{{$tripVehicle->plate}}</option>
                            @foreach($vehicles as $vehicle)
                                <option class="" value="{{$vehicle->_id}}" >
                                    {{$vehicle->plate}}
                                </option>
                            @endforeach
                        </select>

                    </div>
                    <div class="md-form my-2">
                      <label  data-error="wrong" data-success="right" for="price">Price per Ticket</label>
                      <input value="{{$trip->price}}" type="number" id="price" name="price" class="form-control validate">
                      
                    </div>
                    <div class="md-form my-2">
                      <label data-error="wrong" data-success="right" for="origin">Origin</label>
                      <input value="{{$trip->origin}}"type="text" id="origin" name="origin" class="form-control validate">
                      
                    </div>
                    <div class="md-form my-2">
                      <label data-error="wrong" data-success="right" for="destination">Destination</label>
                      <input value="{{$trip->destination}}"type="text" id="destination" name="destination" class="form-control validate">
                    </div>
                    <div class="md-form my-2">
                      <label data-error="wrong" data-success="right" for="startDate">Start Date</label>
                      <input value="{{$trip->startDate}}"type="datetime-local" id="startDate" name="startDate" class="form-control validate">
                    </div>
                    <div class="md-form my-2">
                      <label data-error="wrong" data-success="right" for="endDate">End Date</label>
                      <input value="{{$trip->endDate}}"type="datetime-local" id="endDate" name="endDate" class="form-control validate">
                    </div>
                    <div class="modal-footer d-flex justify-content-left">
                        <button type="submit" class="btn btn-success">Edit Trip Schedule</button>
                    </div>
                </form>
          </div>
    	</div>

  @else 
      <div class="col-lg-4 col-sm-6 col-md-7">
        <div class=" mx-3">
          <h4>DETAILS OF SCHEDULED TRIP</h4>
            <form method="POST" action="/trips" enctype="multipart/form-data">
            @csrf
                <div class="md-form my-2 mx-3">
                    <label for="category">Assign Vehicle</label>
                    <select name="category" class="form-control validate">
                        <option value="{{$tripVehicle->_id}}">{{$tripVehicle->plate}}</option>
                        @foreach($vehicles as $vehicle)
                            <option class="" value="{{$vehicle->_id}}" >
                                {{$vehicle->plate}}
                            </option>
                        @endforeach
                    </select>

                </div>
                <div class="md-form my-2">
                  <label  data-error="wrong" data-success="right" for="price">Price per Ticket</label>
                  <input value="{{$trip->price}}" type="number" id="price" name="price" class="form-control validate">
                  
                </div>
                <div class="md-form my-2">
                  <label data-error="wrong" data-success="right" for="origin">Origin</label>
                  <input value="{{$trip->origin}}"type="text" id="origin" name="origin" class="form-control validate">
                  
                </div>
                <div class="md-form my-2">
                  <label data-error="wrong" data-success="right" for="destination">Destination</label>
                  <input value="{{$trip->destination}}"type="text" id="destination" name="destination" class="form-control validate">
                </div>
                <div class="md-form my-2">
                  <label data-error="wrong" data-success="right" for="startDate">Start Date</label>
                  <input value="{{$trip->startDate}}"type="datetime-local" id="startDate" name="startDate" class="form-control validate">
                </div>
                <div class="md-form my-2">
                  <label data-error="wrong" data-success="right" for="endDate">End Date</label>
                  <input value="{{$trip->endDate}}"type="datetime-local" id="endDate" name="endDate" class="form-control validate">
                </div>
                <div class="modal-footer d-flex justify-content-left">
                    <button type="submit" class="btn btn-success">Create New Trip</button>
                </div>
            </form>
      </div>
  </div>
	{{-- VEHICLE ASSIGN TO TRIP --}}
	<div class="col-lg-4 col-sm-12 col-md-6">
	 	<div class=" mx-3">
	 		<h4> ASSIGNED VEHICLE DETAILS</h4>
            <div class="md-form my-2">
              <label data-error="wrong" data-success="right" for="category">Type of Vehicle</label>
              <input value="{{$tripVehicle->category}}"type="text" id="category" name="category" class="form-control validate" disabled>
            </div>
            <div class="md-form my-2">
              <label data-error="wrong" data-success="right" for="vehicleType">Type of Vehicle</label>
              <input value="{{$tripVehicle->vehicleType}}"type="text" id="vehicleType" name="vehicleType" class="form-control validate" disabled>
            </div>
            <div class="md-form my-2">
              <label data-error="wrong" data-success="right" for="vehicleModel">Model Name</label>
              <input value="{{$tripVehicle->vehicleModel}}" type="text" id="vehicleModel" name="vehicleModel" class="form-control validate" disabled="">
              
            </div>
            <div class="md-form my-2"> 
                <label for="plate">ID/Plate Number</label>
                 <input value="{{$tripVehicle->plate}}" name="plate" id="plate" class="form-control validate" disabled=""></input>
            </div>

            <div class="md-form my-2">
                <label for="seatingCap">Seating Capacity</label>
                <input value="{{$tripVehicle->seatingCap}}" type="number" name="seatingCap" id="seatingCap"  min=0 class="form-control" disabled="">
            </div>

 		</div>
	</div>
	
</div>

@endsection