@extends('layouts.app')

@section('content')
	
	<br>
	<div class="row mx-3">
		<div class="col-lg-6">
			<div class="row mx-3">
				<h4 class="card-title ">Departure Details</h4>
			</div>

			<div class="row">
				<div class="col-lg-3">
					<h5>Origin 		:</h5>
					<h5>Desitination 	:</h5>
					<h5>Preferred date:</h5>
				</div>
				<div class="col-lg-3">
					<h5><b>{{$origin}}</b></h5>
					<h5><b>{{$destination}}</b></h5>
					<h5><b>{{Carbon\Carbon::parse($trip->startDate)->format('M-d-y')}}</b></h5>
				</div>
			</div>
		</div>
		<br>
		<br>
		{{-- SEARCHED TRIPS --}}
		</div>
			<div class="col-lg-9 my-3">
			@if($trips == null)
			<div class="">
				<h4>No trips on your preferred dates</h4>
			</div>
				
			@else
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
									{{-- <th class="align-middle">Route</th> --}}
				                    <th class="align-middle">Departure Time</th>
				                    <th class="align-middle">Departure Date</th>
				                    <th class="align-middle">Ticket Price</th>
				                    <th class="align-middle">Seats left</th>
				                    <th class="align-middle">Action</th>
								</thead>
								<tbody>
									@foreach($trips as $trip)
										@if($trip->isCompleted == false && $trip->isCancelled == false)
											<tr>
												{{-- <td>{{$trip->origin}}-{{$trip->destination}}</td> --}}
												<td>{{Carbon\Carbon::parse($trip->startDate)->format(' h:m:s')}}</td>
												<td>{{Carbon\Carbon::parse($trip->startDate)->format('m-d-Y ')}}</td>
												<td>{{$trip->price}}</td>
												<td>{{$trip->seats}}</td>
												<td>
													<form method="POST" action="/bookings/summary">
		                                                @csrf
		         										<input type="hidden" name="tripId" value="{{$trip->_id}}">
		         										<input type="hidden" name="price" value="{{$trip->price}}">
		         										<input type="hidden" name="quantity" value="{{$quantity}}">
		                                                <button class="btn btn-info btn-block">Book</button>
		                                            </form>

		                                             
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
			@endif


		</div>

	





@endsection