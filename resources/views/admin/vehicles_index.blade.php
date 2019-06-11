@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
	{{-- VEHICLE INVENTORY --}}
		<div class="col-sm-12 col-lg-10">
            {{-- VEHICLE ACTIVE FLEET --}}
			<div class="accordion" id="transactionSummary_accordion">
                <div class="align-middle" id="display_transactionummary">
                    <button class="btn btn-success btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsetransactionsummary" aria-expanded="true" aria-controls="collapsetransactionsummary">
                        <h4>MLN Express Active Fleet</h4>
                    </button>
                </div>
                <div id="collapsetransactionsummary" class="collapse show px-0" aria-labelledby="display_transactionummary" data-parent="#transactionSummary_accordion">
         
                        <table class="table table-hover table-responsive">
                            <thead >                                   
                                <th class="align-middle">Category</th>
                                <th class="align-middle">Type</th>
                                <th class="align-middle">Model</th>
                                <th class="align-middle">ID/Plate Number</th>
                                <th class="align-middle">Seating Capacity</th>
                                <th class="align-middle">Trip Status</th>
                                <th class="align-middle">Condition</th>
                            </thead>
                            <tbody>
                            @foreach($vehicles as $vehicle)
                                @if($vehicle->isServiceable == true)
                                    <tr>                                          
                                        <td>
                                            <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                                {{$vehicle->category}}
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                                {{$vehicle->vehicleType}}
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                                {{$vehicle->vehicleModel}}
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                                {{$vehicle->plate}}
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                                {{$vehicle->seatingCap}}
                                            </a>
                                        </td>
                                        <td>
                                            @if($vehicle->onTrip == true)
                                                <span>In Transit</span>
                                            @else
                                                <span>at Terminal</span>
                                            @endif
                                        </td>
                                    
                                        <td>
 
                                            @if($vehicle->isServiceable == 'true')
                                                <form method="POST" action="/vehicles/service/{{$vehicle->_id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-success">Available</button>
                                                </form>                                 
                                            @else
                                                <form method="POST" action="/vehicles/service/{{$vehicle->_id}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">Repair on-going</button>
                                                </form>
                                            @endif
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
            <br>
            {{-- BROKEN VEHICLES --}}
            <div class="accordion" id="transactionSummary2_accordion">
                <div class="align-middle" id="display_transactionummary2">
                    <button class="btn btn-danger btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsetransactionsummary2" aria-expanded="true" aria-controls="collapsetransactionsummary2">
                        <h4>Vehicles Under-Repair</h4>
                    </button>
                </div>
                <div id="collapsetransactionsummary2" class="collapse show px-0" aria-labelledby="display_transactionummary2" data-parent="#transactionSummary2_accordion">
         
                    <table class="table table-hover table-responsive">
                        <thead >                                   
                            <th class="align-middle">Category</th>
                            <th class="align-middle">Type</th>
                            <th class="align-middle">Model</th>
                            <th class="align-middle">ID/Plate Number</th>
                            <th class="align-middle">Seating Capacity</th>
                            <th class="align-middle">Trip Status</th>
                            <th class="align-middle">Condition</th>

                        </thead>
                        <tbody>
                        @foreach($vehicles as $vehicle)
                            @if($vehicle->isServiceable !== true)
                                <tr>                                          
                                    <td>
                                        <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                            {{$vehicle->category}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                            {{$vehicle->vehicleType}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                            {{$vehicle->vehicleModel}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                            {{$vehicle->plate}}
                                        </a>
                                    </td>
                                    <td>
                                        <a class="text-dark" href="/vehicles/{{$vehicle->_id}}/edit" >
                                            {{$vehicle->seatingCap}}
                                        </a>
                                    </td>
                                    <td>
                                        @if($vehicle->onTrip == true)
                                            <span>In Transit</span>
                                        @else
                                            <span>at Terminal</span>
                                        @endif
                                    </td>
                                
                                    <td>

                                        @if($vehicle->isServiceable == 'true')
                                            <form method="POST" action="/vehicles/service/{{$vehicle->_id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-success">Available</button>
                                            </form>                                 
                                        @else
                                            <form method="POST" action="/vehicles/service/{{$vehicle->_id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">Repair on-going</button>
                                            </form>
                                        @endif
                                    </td>

                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
		</div>

	{{-- SIDEBAR --}}
		<div class="col-sm-12 col-lg-2 mr-auto ">
            <h4 class="btn btn-primary btn-block">Admin Menu</h4>
    		<ul class="list-group">
                <li class="list-group-item btn"  data-toggle="modal" data-target="#modalAddTrip">
                    Add Trip
                </li>
                <li class="list-group-item btn" data-toggle="modal" data-target="#modalAddVehicleForm">
                    Add Vehicle
                </li>
                <li class="list-group-item btn"  data-toggle="modal" data-target="#modalAddCategory">
                    Add Vehicle Class
                </li>
                <li class="list-group-item btn"  data-toggle="modal" data-target="#modalAddLocation">
                    Add location
                </li>


            </ul>
		</div>
</div>

{{-- MODALS --}}

{{-- ADD TRIP-MODEL  MODAL --}}

    <div class="modal fade modalcss" id="modalAddTrip" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                  <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">New Trip Schedule</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body mx-3">
                        <form method="POST" action="/trips" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="md-form col-lg-8 ">
{{--                                     <label for="vehicleId">Vehicle</label>
 --}}                                    <select name="vehicleId" class="form-control validate">
                                        <option value="" disabled selected>Assign Vehicle</option>
                                        @foreach($vehicles as $vehicle)
                                            <option class="" value="{{$vehicle->_id}}" >
                                                {{$vehicle->plate}}
                                            </option>
                                        @endforeach
                                    </select>
                
                                </div> 
                                <div class="col-lg-4">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAddVehicleForm">
                                        Add Vehicle
                                    </button>
                                </div>
                            </div>
                           
                            <div class="md-form my-2">
                              {{-- <label data-error="wrong" data-success="right" for="price">Price per Ticket</label> --}}
                              <input type="number" id="price" name="price" class="form-control validate" placeholder="Ticket Price">

                            </div>
                            <div class="md-form my-2">
     {{--                            <label data-error="wrong" data-success="right" for="origin">Origin</label>
                                <input type="text" id="origin" name="origin" class="form-control validate"> --}}
                                <select name="origin" class="form-control validate">
                                    <option value="" disabled selected>Origin</option>
                                    @foreach($locations as $location)
                                        <option class="">
                                            {{$location->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="md-form row">
                              {{-- <label data-error="wrong" data-success="right" for="destination">Destination</label>
                              <input type="text" id="destination" name="destination" class="form-control validate"> --}}
                                <div class="col-lg-8">
                                  <select name="destination" class="form-control validate">
                                        <option value="" disabled selected>Destination</option>
                                        @foreach($locations as $location)
                                            <option class="">
                                                {{$location->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4">   
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalAddLocation">
                                    Add New Location
                                </button> 
                            </div>
                            </div>
                            <div class="md-form my-2 form-inline">
                              <label data-error="wrong" data-success="right" for="startDate">Start Date </label>
                              <input type="datetime-local" id="startDate" name="startDate" class="form-control validate mx-2" placeholder="Start of Trip">
                            </div>
                            <div class="md-form my-2 form-inline">
                              <label data-error="wron g" data-success="right" for="endDate">End Date</label>
                              <input type="datetime-local" id="endDate" name="endDate" class="form-control validate mx-2" placeholder="End of Trip">
                            </div>


                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Add Trip Schedule</button>
                            </div>
                        </form>
                  </div>
            </div>
        </div>
    </div>

{{-- ADD VEHICLE-MODEL  MODAL --}}

    <div class="modal fade modalcss" id="modalAddVehicleForm" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="dialog">
            <div class="modal-content">
                  <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">New Vehicle Specification</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body mx-3">
                        <form method="POST" action="/vehicles" enctype="multipart/form-data">
                        @csrf
                            <div class="md-form my-2 mx-3">
                                <label for="category">Service Class</label>
                                <select name="category" >
                                    <option value="" disabled selected>Select Class</option>
                                    @foreach($categories as $category)
                                        <option class="categories" >
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                                <button type="button" class="btn btn-outline" data-toggle="modal" data-target="#modalAddCategory">
                                Add Class
                                </button>            
                            </div>
                            <div class="md-form my-2">
                              <label data-error="wrong" data-success="right" for="vehicleType">Type of Vehicle</label>
                              <input type="text" id="vehicleType" name="vehicleType" class="form-control validate">
                              
                            </div>
                            <div class="md-form my-2">
                              <label data-error="wrong" data-success="right" for="vehicleModel">Model Name</label>
                              <input type="text" id="vehicleModel" name="vehicleModel" class="form-control validate">
                              
                            </div>
                            <div class="md-form my-2"> 
                                <label for="plate">ID/Plate Number</label>
                                 <input rows="4" name="plate" id="plate" class="form-control">                            
                             </div>

                            <div class="md-form my-2">
                                <label for="seatingCap">Seating Capacity</label>
                                <input type="number" name="seatingCap" id="seatingCap" step=0.01 min=0 class="form-control"><
                            </div>                            
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="submit" class="btn btn-success">Add Vehicle to Fleet</button>
                            </div>
                        </form>
                  </div>
            </div>
        </div>
    </div>

{{-- MODAL - ADD CATEGORY --}}

    <div class="modal fade modalcss" id="modalAddCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="dialog">
        <div class="modal-content" id="cssmodalAddCategory" >
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New Service Class</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form method="POST" action="/categories">
                    @csrf
                    <div class="form-group">
                        <label for="name">Service Class Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Add New Class</button>
                </form>
            </div>
               
        </div>
      </div>
    </div>

{{-- MODAL - ADD LOCATION --}}

    <div class="modal fade modalcss" id="modalAddLocation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="dialog">
        <div class="modal-content" id="cssmodalAddLocation" >
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">New Service Class</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <form method="POST" action="/locations">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="streetAdress">Street Address</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="city">City/Municipalty</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="province">Province/Region</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success">Add New Location</button>
                </form>
            </div>
               
        </div>
      </div>
    </div>
@endsection