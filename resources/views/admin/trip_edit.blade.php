@extends('layouts.app')

@section('content')


<div class="row">
	{{-- TRIP DETIALS --}}
	<div class="col-lg-6 col-sm-12 col-md-7">
      	<div class="modal-body mx-3">
      		<h4>DETAILS OF SCHEDULED TRIP</h4>
            <form method="POST" action="/trips/{{$trip->_id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                <div class="md-form my-2 mx-3">
                    <label for="category">Assign Vehicle</label>
                    <select name="category" class="form-control validate">
                        <option value="{{$vehicle->_id}}">{{$vehicle->plate}}</option>
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
	{{-- VEHICLE ASSIGN TO TRIP --}}
	<div class="col-lg-6 col-sm-12 col-md-5">
	 	<div class="modal-body mx-3">
	 		<h4> ASSIGNED VEHICLE DETAILS</h4>
            <div class="md-form my-2">
              <label data-error="wrong" data-success="right" for="category">Type of Vehicle</label>
              <input value="{{$vehicle->category}}"type="text" id="category" name="category" class="form-control validate" disabled>
            </div>
            <div class="md-form my-2">
              <label data-error="wrong" data-success="right" for="vehicleType">Type of Vehicle</label>
              <input value="{{$vehicle->vehicleType}}"type="text" id="vehicleType" name="vehicleType" class="form-control validate" disabled>
            </div>
            <div class="md-form my-2">
              <label data-error="wrong" data-success="right" for="vehicleModel">Model Name</label>
              <input value="{{$vehicle->vehicleModel}}" type="text" id="vehicleModel" name="vehicleModel" class="form-control validate" disabled="">
              
            </div>
            <div class="md-form my-2"> 
                <label for="plate">ID/Plate Number</label>
                 <input value="{{$vehicle->plate}}" name="plate" id="plate" class="form-control validate" disabled=""></input>
            </div>

            <div class="md-form my-2">
                <label for="seatingCap">Seating Capacity</label>
                <input value="{{$vehicle->seatingCap}}" type="number" name="seatingCap" id="seatingCap" step=0.01 min=0 class="form-control" disabled="">
            </div>

 		</div>
	</div>
	
</div>

@endsection