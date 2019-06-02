@extends('layouts.app')

@section('content')



	<div class="row mx-3">
		<div class="col-lg-7 col-sm-12">
			{{-- PENDING TRIPS --}}
				<div class="accordion" id="genericAccordion_01">
	                <div class="align-middle" id="DisplayGenericAccordion_01">
	                    <button class="btn btn-outline-success btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsePart_01" aria-expanded="true" aria-controls="collapsePart_01">
	                        <h4>Scheduled Trips</h4>
	                    </button>
	                </div>
	                <div id="collapsePart_01" class="collapse show px-0" aria-labelledby="DisplayGenericAccordion_01" data-parent="#genericAccordion_01">
						<table class="table table-hover table-responsive">
							<thead>
								<th class="align-middle">Route</th>
			                    <th class="align-middle">Departure</th>
			                    <th class="align-middle">Arrival</th>
			                    <th class="align-middle">Ticket Price</th>
			                    <th class="align-middle">Seats left</th>
			                    <th class="align-middle">Action</th>
							</thead>
							<tbody>
								@foreach($trips as $trip)
									@if($trip->isCompleted == false && $trip->isCancelled == false)
										<tr>
											<td>{{$trip->origin}}-{{$trip->destination}}</td>
											<td>{{$trip->startDate}}</td>
											<td>{{$trip->endDate}}</td>
											<td>{{$trip->price}}</td>
											<td>{{$trip->seats}}</td>
											<td>
												<form method="POST" action="/trips/{{$trip->_id}}">
	                                                @csrf
	                                                @method('DELETE')
	                                                <button class="btn btn-danger btn-block">Cancel</button>
	                                            </form>
	                                            <a href="/trips/{{$trip->_id}}">
	                                            	<button class="btn btn-info btn-block">Edit</button>
	                                            </a>
	                                             
											</td>
										</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

				<br>
			{{-- COMPLETED TRIPS --}}
				<div class="accordion" id="genericAccordion_02">
	                <div class="align-middle" id="DisplayGenericAccordion_02">
	                    <button class="btn btn-outline-info btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsePart_02" aria-expanded="true" aria-controls="collapsePart_02">
	                        <h4>Completed Trips</h4>
	                    </button>
	                </div>
	                <div id="collapsePart_02" class="collapse show px-0" aria-labelledby="DisplayGenericAccordion_02" data-parent="#genericAccordion_02">
						<table class="table table-hover table-responsive">
							<thead>
								<th class="align-middle">Route</th>
			                    <th class="align-middle">Departure</th>
			                    <th class="align-middle">Arrival</th>
			                    <th class="align-middle">Ticket Price</th>
			                    <th class="align-middle">Seats left</th>
			                    <th class="align-middle">Action</th>
							</thead>
							<tbody>
								@foreach($trips as $trip)
									@if($trip->isCompleted == true && $trip->isCancelled == false)
										<tr>
											<td>{{$trip->origin}}-{{$trip->destination}}</td>
											<td>{{$trip->startDate}}</td>
											<td>{{$trip->endDate}}</td>
											<td>{{$trip->price}}</td>
											<td>{{$trip->seats}}</td>
											<td>
												<form method="POST" action="/trip/{{$trip->_id}}">
	                                                @csrf
	                                                @method('DELETE')
	                                                <button class="btn btn-danger btn-block">Cancel</button>
	                                            </form>
	                                            <a href="/trip/{{$trip->_id}}">
	                                            	<button class="btn btn-info btn-block">Edit</button>
	                                            </a>
	                                             
											</td>
										</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				<br>
			{{-- CANCELLED TRIPS --}}
	      		<div class="accordion" id="genericAccordion_03">
	                <div class="align-middle" id="DisplayGenericAccordion_03">
	                    <button class="btn btn-outline-danger btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsePart_03" aria-expanded="true" aria-controls="collapsePart_03">
	                        <h4>Cancelled</h4>
	                    </button>
	                </div>
	                <div id="collapsePart_03" class="collapse show px-0" aria-labelledby="DisplayGenericAccordion_03" data-parent="#genericAccordion_03">
						<table class="table table-hover table-responsive">
							<thead>
								<th class="align-middle">Route</th>
			                    <th class="align-middle">Departure</th>
			                    <th class="align-middle">Arrival</th>
			                    <th class="align-middle">Ticket Price</th>
			                    <th class="align-middle">Seats left</th>
			                    <th class="align-middle">Action</th>
							</thead>
							<tbody>
								@foreach($trips as $trip)
									@if($trip->isCancelled == true)
										<tr>
											<td>{{$trip->origin}}-{{$trip->destination}}</td>
											<td>{{$trip->startDate}}</td>
											<td>{{$trip->endDate}}</td>
											<td>{{$trip->price}}</td>
											<td>{{$trip->seats}}</td>
											<td>
												<form method="POST" action="/trip/{{$trip->_id}}">
	                                                @csrf
	                                                @method('DELETE')
	                                                <button class="btn btn-danger btn-block">Cancel</button>
	                                            </form>
	                                            <a href="/trip/{{$trip->_id}}">
	                                            	<button class="btn btn-info btn-block">Edit</button>
	                                            </a>
	                                             
											</td>
										</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
		</div>
		<div class="col-sm-12 col-lg-2 mr-auto ">
            <h4 class="btn btn-primary btn-block">Admin Menu</h4>
    		<ul class="list-group">
                <li class="list-group-item btn" data-toggle="modal" data-target="#modalAddVehicleForm">
                    Add Vehicle
                </li>
                <li class="list-group-item btn"  data-toggle="modal" data-target="#modalAddCategory">
                    Add Category
                </li>
                <li class="list-group-item btn"  data-toggle="modal" data-target="#modalAddTrip">
                    Add Trip
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
                            <div class="md-form my-2 mx-3">
                                <label for="vehicleId">Vehicle/label>
                                <select name="vehicleId" class="form-control validate">
                                    <option value="" disabled selected>Select Vehicles</option>
                                    @foreach($vehicles as $vehicle)
                                        <option class="" value="{{$vehicle->_id}}" >
                                            {{$vehicle->plate}}
                                        </option>
                                    @endforeach
                                </select>
            
                            </div>
                            <div class="md-form my-2">
                              <label data-error="wrong" data-success="right" for="price">Price per Ticket</label>
                              <input type="number" id="price" name="price" class="form-control validate">
                              
                            </div>
                            <div class="md-form my-2">
                              <label data-error="wrong" data-success="right" for="origin">Origin</label>
                              <input type="text" id="origin" name="origin" class="form-control validate">
                              
                            </div>
                            <div class="md-form my-2">
                              <label data-error="wrong" data-success="right" for="destination">Destination</label>
                              <input type="text" id="destination" name="destination" class="form-control validate">
                            </div>
                            <div class="md-form my-2">
                              <label data-error="wrong" data-success="right" for="startDate">Start Date</label>
                              <input type="datetime-local" id="startDate" name="startDate" class="form-control validate">
                            </div>
                            <div class="md-form my-2">
                              <label data-error="wrong" data-success="right" for="endDate">End Date</label>
                              <input type="datetime-local" id="endDate" name="endDate" class="form-control validate">
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
                                 <input rows="4" name="plate" id="plate" class="form-control"></input>
                            </div>

                            <div class="md-form my-2">
                                <label for="seatingCap">Seating Capacity</label>
                                <input type="number" name="seatingCap" id="seatingCap" step=0.01 min=0 class="form-control">
                            </div>
                        
                        {{-- 
                        <div class="form-control-file">
                            <label for="image">Upload Image of Equipment</label>
                            <input type="file" name="image" id="image" class="">
                        </div> --}}
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






@endsection