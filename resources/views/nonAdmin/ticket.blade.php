@extends('layouts.app')

@section('content')


<div class="row mx-5">

	<div class="col-lg-12 col-md-6">
		<h2 class="card-title">MLN EXPRESS </h2>	
		<h3 class="card-title">BOOKING SUMMARY</h3>	
		<div class="card">
			<div class="card-body">
				<div class="card">
					<h4 class="card-title "><b>Booking Details</b></h4>
					<div class="row">

						<div class="card-body">
							<div class="col-lg-3">
								<p>Status 		: <b>Confirmed</b></p>
								<p>Booking date	: <b>{{Carbon\Carbon::parse($booking->bookingDate)->format('m-d-y h:m:s')}}</b></p>
							</div>
							<div class="col-lg-4">
								<span>Booking Reference No.</span>
								<h4 class="text-uppercase"><b>{!! str_limit($booking->_id, 7,'') !!}</b></h4>
								<br>
								<span>Trip Reference No.</span>
								<h4 class="text-uppercase"><b>{!! str_limit($trip->_id, 7,'') !!}</b></h4>
							</div>
						</div>
					</div>
					
				</div>
				<br>
				@if(Session::get("user")->isAdmin == false)
					<h4 class="card-title "><b>Customer Information</b></h4>
					<div class="row">
						<div class="col-lg-4">
							<pre><p>Name 			: 	<b>{{Session::get("user")->lname}}, {{Session::get("user")->fname}}</b></p></pre>
							<pre><p>Mobile 			: 	<b>{{Session::get("user")->mobile}}</b></p></pre>
							<pre><p>Email 			: 	<b>{{Session::get("user")->email}}</b></p></pre>
						</div>
					</div>
				@endif
				<br>
				<h4 class="card-title "><b>Trip Details</b></h4>			
				<div class="row">
					<div class="col-lg-3">
						<pre><p>Trip Class 		: 	<b>{{$vehicle->category}}</b></p></pre>
						<pre><p>Origin 			:	<b>{{$trip->origin}}</b></p></pre>
						<pre><p>Destination 		: 	<b>{{$trip->destination}}</b></p></pre>
						<pre><p>Departure Date		: 	<b>{{Carbon\Carbon::parse($trip->startDate)->format('M-d-y')}}</b></p></pre>
						<pre><p>Departure Time 		: 	<b>{{Carbon\Carbon::parse($trip->startDate)->format('h:i:s A')}}</b></p></pre>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-lg-3">
						<h4 class="card-title "><b>Vehicle Details</b></h4>
						<pre><p>Transport Type		:	<b>{{$vehicle->vehicleType}}</b></p></pre>
						<pre><p>Vehicle Model		: 	<b>{{$vehicle->vehicleModel}}</b></p></pre>
						<pre><p>Vehicle ID/plate 	: 	<b>{{$vehicle->plate}}</b></p></pre>

					</div>
				</div>
				<br>

                <h4 class="card-title "><b>Payment Details</b></h4>			
                <div class="row">
					<div class="col-lg-5">
						<pre><p>Ticket Price		:	<b>₱{{$trip->price}}</b></p></pre>
						<pre><p>Ticket Quantity		: 	<b>{{$booking->quantity}}</b></p></pre>
						<pre><p>Total Amount		: 	<b>₱{{$booking->amount}}</b></p></pre>
						<pre><p>Payment Type		:	<b>{{$booking->paymentType}}</b></p></pre>
						<pre><p>Charge ID		:	<b>{{$booking->chargeId}}</b></p></pre>
					</div>
				</div>
				<br>
			</div>
			
		</div>
	</div>
</div>


@endsection