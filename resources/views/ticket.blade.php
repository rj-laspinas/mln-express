@extends('layouts.app')

@section('content')


<div class="row mx-5">

	<div class="col-lg-8 col-md-6">
		<h2 class="card-title">MLN EXPRESS </h2>	
		<h3 class="card-title">BOOKING SUMMARY</h3>	
		<div class="card">
			<div class="card-body">
				<div class="card">
					<h4 class="card-title "><b>Booking Details</b></h4>
					<div class="row">

						<div class="card-body">
							<div class="col-lg-3">
								<p>Name 		: <b>Confirmed</b></p>
								<p>Booking date	: <b>{{Carbon\Carbon::parse($booking->bookingDate)->format('m-d-y h:m:s')}}</b></p>
							</div>
							<div class="col-lg-4">
								<span>Booking Reference No.</span>
								<h4 class="text-uppercase"><b>{{$referenceNo}}</b></h4>
								<br>
								<span>Trip Reference No.</span>
								<h4 class="text-uppercase"><b>{{$referenceNo}}</b></h4>
							</div>
						</div>
					</div>
					
				</div>
				<br>
				@if(Session::get("user")->isAdmin == false)
					<h4 class="card-title "><b>Customer Information</b></h4>
					<div class="row">
						<div class="col-lg-3">
							<p>Name 		:</p>
							<p>Mobile 		:</p>
							<p>Email 		:</p>
						</div>
						<div class="col-lg-3">
							<p><b>{{Session::get("user")->lname}}, {{Session::get("user")->fname}}</b></p>
							<p><b>{{Session::get("user")->mobile}}</b></p>
							<p><b>{{Session::get("user")->email}}</b></p>
						</div>
					</div>
				@endif
				<br>
				<h4 class="card-title "><b>Trip Details</b></h4>			
				<div class="row">
					<div class="col-lg-3">
						<p>Trip Class 		:</p>
						<p>Origin 			:</p>
						<p>Destination 		:</p>
						<p>Departure Date	:</p>
						<p>Departure Time 	:</p>
					</div>
					<div class="col-lg-3">
						<p><b>{{$vehicle->category}}</b></p>
						<p><b>{{$trip->origin}}</b></p>
						<p><b>{{$trip->destination}}</b></p>
						<p><b>{{Carbon\Carbon::parse($trip->startDate)->format('m-d-y')}}</b></p>
						<p><b>{{Carbon\Carbon::parse($trip->startDate)->format('h:m:s')}}</b></p>
					</div>
				</div>
				<br>
				<h4 class="card-title "><b>Vehicle Details</b></h4>
				<div class="row">
					<div class="col-lg-3">
						<p>Transport Type	:</p>
						<p>Vehicle Model	:</p>
						<p>Vehicle ID/Plate	:</p>

					</div>
					<div class="col-lg-3">
						<p><b>{{$vehicle->vehicleType}}</b></p>
						<p><b>{{$vehicle->vehicleModel}}</b></p>
						<p><b>{{$vehicle->plate}}</b></p>
					</div>
				</div>
				<br>

                <h4 class="card-title "><b>Payment Details</b></h4>			
                <div class="row">
					<div class="col-lg-3">
						<p>Ticket Price		:</p>
						<p>Ticket Quantity	:</p>
						<p>Total Amount		:</p>
						<p>Payment Type		:</p>
						<p>Charge ID		:</p>

					</div>
					<div class="col-lg-4">
						<p><b>₱{{$trip->price}}</b></p>
						<p><b>{{$booking->quantity}}</b></p>
						<p><b>₱{{$booking->amount}}</b></p>
						<p><b>{{$booking->paymentType}}</b></p>
						<p><b>{{$booking->chargeId}}</b></p>
					</div>
				</div>
				<br>

			   
	            
			</div>
			
		</div>
	</div>
</div>


@endsection