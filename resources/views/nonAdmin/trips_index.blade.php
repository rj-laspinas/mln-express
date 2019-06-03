@extends('layouts.app')

@section('content')
	<div class="row mx-3">
			<h4 class="card-title mx-3">Departure Details</h4>
	</div>
	<br>
	<div class="row mx-3">
		<div class="col-lg-1">
			<p>Origin 		:</p>
			<p>Desitination 	:</p>
			<p>Preferred date:</p>
		</div>
		<div class="col-lg-2">
			<p><b>{{$origin}}</b></p>
			<p><b>{{$destination}}</b></p>
			<p><b>{{$startDate}}</b></p>
		</div>
	
	</div>
		

	@if($trips == null)
	<div class="container">
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





@endsection