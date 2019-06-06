@extends('layouts.app')

@section('content')

<div class="row mx-3">
		<div class="col-lg-12 col-sm-12">
			{{-- ACTIVE BOOKINGS --}}
				<div class="accordion" id="genericAccordion_01">
	                <div class="align-middle" id="DisplayGenericAccordion_01">
	                    <button class="btn btn-success btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsePart_01" aria-expanded="true" aria-controls="collapsePart_01">
	                        <h4>My Active Bookings</h4>
	                    </button>
	                </div>
	                <div id="collapsePart_01" class="collapse show px-0" aria-labelledby="DisplayGenericAccordion_01" data-parent="#genericAccordion_01">
						<table class="table table-hover table-responsive">
							<thead>
								<th class="align-middle text-center">Booking Details</th>
			                    <th class="align-middle text-center">Trip Details</th>
			                    <th class="align-middle text-center">Vehicle Details</th>
			                    <th class="align-middle text-center">Payment Details</th>
			                    <th class="align-middle text-center">Actions</th>

							</thead>
							<tbody>
								@foreach($bookings as $booking)
									@if($booking->isCancelled == false)
										<tr>
											<td>
												<p>Booking Ref. No :  <b>{{Str::limit($booking->_id, 7)}}</b></p>
												<p>Booking date	: <b>{{Carbon\Carbon::parse($booking->bookingDate)->format('m-d-y h:m:s')}}</b></p>
											</td>
											
											@foreach($trips as $trip)
												@if($booking->tripId == $trip->_id)
												<td>
													<p>Route : <b>{{$trip->origin}} - {{$trip->destination}}</b></p>
													<p>Departure Date/Time: <b>{{Carbon\Carbon::parse($trip->startDate)->format('m-d-y h:m:s')}}</b></p>
													<p>Arrival Date/Time: <b>{{Carbon\Carbon::parse($trip->endDate)->format('m-d-y h:m:s')}}</b></p>
												</td>
												<td>
													@foreach($vehicles as $vehicle)
														@if($trip->vehicleId == $vehicle->_id)
														<div class="col-lg-6">
															<p>Class 			: <br><b>{{$vehicle->category}}</b></p>
															<p>Transport Type	: <br><b>{{$vehicle->vehicleType}}</b></p>
														</div>
														<div class="col-lg-6">
															<p>Vehicle Model	: <br><b>{{$vehicle->vehicleModel}}</b></p>
															<p>Vehicle ID/Plate	: <br><b>{{$vehicle->plate}}</b></p>
														</div>
															
															
														@endif
													@endforeach
												</td>
												@endif
											@endforeach
											<td>
												<div class="col-lg-6">
													<p>Ticket Price 	:	<b>₱{{$trip->price}}</b></p>
													<p>No. of Tickets	:	<b>{{$booking->quantity}}</b></p>
													<p>Total Amount Paid:	<b>₱{{$booking->amount}}</b></p>
												</div>
												<div class="col-lg-6">
													<p>Mode of Payment 	:	<b>{{$booking->paymentType}}</b></p>
													<p>Payment Reference:	<b>{{Str::limit($booking->chargeId, 15)}}</b></p>
												</div>
											</td>

	                                        <td>
	                                            <a href="/bookings/{{$booking->_id}}">
	                                            	<button class="btn btn-info btn-block">Edit</button>
	                                            </a>
	                                             
											</td>
											<td>
												<form method="POST" action="/bookings/cancel/{{$booking->_id}}">
	                                                @csrf
	                                                <button class="btn btn-danger btn-block">Cancel</button>
	                                            </form>
	                                        </td>
										</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

			{{-- CANCELLED BOOKINGS --}}
				<div class="accordion" id="genericAccordion_02">
	                <div class="align-middle" id="DisplayGenericAccordion_02">
	                    <button class="btn btn-danger btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsePart_02" aria-expanded="true" aria-controls="collapsePart_02">
	                        <h4>Cancelled Bookings</h4>
	                    </button>
	                </div>
	                <div id="collapsePart_02" class="collapse show px-0" aria-labelledby="DisplayGenericAccordion_02" data-parent="#genericAccordion_02">
						<table class="table table-hover table-responsive">
							<thead>
								<th class="align-middle">Booking Details</th>
			                    <th class="align-middle">Trip Details</th>
			                    <th class="align-middle">Vehicle Details</th>
			                    <th class="align-middle">Payment Details</th>
			                    <th class="align-middle">Actions</th>

							</thead>
							<tbody>
								@foreach($bookings as $booking)
									@if($booking->isCancelled == true)
										<tr>
											<td>
												<p>Booking Ref. No :  <b>{{Str::limit($booking->_id, 7)}}</b></p>
												<p>Booking date	: <b>{{Carbon\Carbon::parse($booking->bookingDate)->format('m-d-y h:m:s')}}</b></p>
											</td>
											
											@foreach($trips as $trip)
												@if($booking->tripId == $trip->_id)
												<td>
													<p>Route : <b>{{$trip->origin}} - {{$trip->destination}}</b></p>
													<p>Departure Date/Time: <b>{{Carbon\Carbon::parse($trip->startDate)->format('m-d-y h:m:s')}}</b></p>
													<p>Arrival Date/Time: <b>{{Carbon\Carbon::parse($trip->endDate)->format('m-d-y h:m:s')}}</b></p>
												</td>
												<td>
													@foreach($vehicles as $vehicle)
														@if($trip->vehicleId == $vehicle->_id)
														<div class="col-lg-6">
															<p>Class 			: <br><b>{{$vehicle->category}}</b></p>
															<p>Transport Type	: <br><b>{{$vehicle->vehicleType}}</b></p>
														</div>
														<div class="col-lg-6">
															<p>Vehicle Model	: <br><b>{{$vehicle->vehicleModel}}</b></p>
															<p>Vehicle ID/Plate	: <br><b>{{$vehicle->plate}}</b></p>
														</div>
															
															
														@endif
													@endforeach
												</td>
												@endif
											@endforeach
											<td>
												<div class="col-lg-6">
													<p>Ticket Price 	:	<b>₱{{$trip->price}}</b></p>
													<p>No. of Tickets	:	<b>{{$booking->quantity}}</b></p>
													<p>Total Amount Paid:	<b>₱{{$booking->amount}}</b></p>
												</div>
												<div class="col-lg-6">
													<p>Mode of Payment 	:	<b>{{$booking->paymentType}}</b></p>
													<p>Payment Reference:	<b>{{Str::limit($booking->chargeId, 15)}}</b></p>
												</div>
											</td>

	                                        <td>
	                                            <a href="/bookings/{{$booking->_id}}">
	                                            	<button class="btn btn-info btn-block">Edit</button>
	                                            </a>
	                                             
											</td>
											<td>
												<form method="POST" action="/bookings/cancel/{{$booking->_id}}">
	                                                @csrf
	                                                <button class="btn btn-danger btn-block">Cancel</button>
	                                            </form>
	                                        </td>
										</tr>
									@endif
								@endforeach
							</tbody>
						</table>
					</div>
				</div>

@endsection