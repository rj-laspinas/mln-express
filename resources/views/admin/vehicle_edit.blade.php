@extends('layouts.app')

@section('content')


	<div class="row">
	{{-- 
		<div class="col-lg-6 col-sm-12">
			<img class=" img-display " style="height: auto; width: 100%; padding-top: 2vh;" src="/{{$vehicle->image}}" alt="item Specifications image">
		</div> --}}
		{{--  VEHICLE DETAILS - EDIT FORM --}}
		<div class="col-lg-4 col-sm-12 mx-3">
	        <div class="modal-body mx-3">
                <form method="POST" action="/vehicles/{{$vehicle->_id}}" enctype="multipart/form-data">
                	@csrf
                	@method("PUT")
                    <div class="md-form my-2 mx-3">
                        <label for="category">Service Class</label>
                        <select name="category" >
                            <option >{{$vehicle->category}}</option>
                            @foreach($categories as $category)
                                <option class="categories" >
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </select>
                        <button type="button" class="btn" data-toggle="modal" data-target="#modalAddCategory">
                        Add New Service Class
                        </button>            
                    </div>
                    <div class="md-form my-2">
                      <label data-error="wrong" data-success="right" for="vehicleType">Type of Vehicle</label>
                      <input value="{{$vehicle->vehicleType}}"type="text" id="vehicleType" name="vehicleType" class="form-control validate">
                      
                    </div>
                    <div class="md-form my-2">
                      <label data-error="wrong" data-success="right" for="vehicleModel">Model Name</label>
                      <input value="{{$vehicle->vehicleModel}}" type="text" id="vehicleModel" name="vehicleModel" class="form-control validate">
                      
                    </div>
                    <div class="md-form my-2"> 
                        <label for="plate">ID/Plate Number</label>
                         <input value="{{$vehicle->plate}}" name="plate" id="plate" class="form-control"></input>
                    </div>

                    <div class="md-form my-2">
                        <label for="seatingCap">Seating Capacity</label>
                        <input value="{{$vehicle->seatingCap}}" type="number" name="seatingCap" id="seatingCap" step=0.01 min=0 class="form-control">
                    </div>
                
	                {{-- 
	                <div class="form-control-file">
	                    <label for="image">Upload Image of Equipment</label>
	                    <input type="file" name="image" id="image" class="">
	                </div> --}}
                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Edit Vehicle Details/button></button>	
                    </div>
            	</form>
         	</div>
		</div>
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
	</div>


@endsection