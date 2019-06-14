@extends('layouts.app')

@section('content')


<div class="row mx-5">

	<div class="col-lg-6 col-md-6">
		<h3 class="card-title">BOOKING SUMMARY</h3>	
		<div class="card">
			<div class="card-body">
				
					<h4 class="card-title "><b>Customer Information</b></h4>
				<div class="row">
					<div class="col-lg-2">
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
				<br>
				<h4 class="card-title "><b>Trip Details</b></h4>			

					<div class="md-form my-2">
						<label data-error="wrong" data-success="right" for="origin">Origin</label>
                        <input id="origin" type="text" class="form-control" name="" value="{{$trip->origin}}" required autofocus disabled>

	                </div>
	                <div class="md-form my-2">
	                 	<label data-error="wrong" data-success="right" for="destination">Destination</label>
                        <input id="" type="text" class="form-control" name="" value="{{$trip->destination}}" required autofocus disabled>

	                </div>
	                <div class="md-form my-2">
	                	<label data-error="wrong" data-success="right" for="startDate">Date/Time of Departure</label>
                      <input id="" type="text" class="form-control" name="" value="{{Carbon\Carbon::parse($trip->startDate)->format('m-d-Y h:m:s')}}" required autofocus disabled>
               
                    </div>

                    <h4 class="card-title "><b>Billing Details</b></h4>			

					<div class="md-form my-2">
						<label data-error="wrong" data-success="right" for="origin">Price per Ticket</label>
                        <input id="" type="text" class="form-control" name="" value="{{$price}}" required autofocus disabled>

	                </div>
	                <div class="md-form my-2">
	                 	<label data-error="wrong" data-success="right" for="destination">Quantity</label>
                        <input id="" type="text" class="form-control" name="" value="{{$quantity}}" required autofocus disabled>

	                </div>
	                <div class="md-form my-2">
	                	<label data-error="wrong" data-success="right" for="startDate">Total Fare (Php)</label>
                      <input id="" type="text" class="form-control" name="" value="{{$amount}}" required autofocus disabled>
               
                    </div>

			    <form method="POST" action="/bookings" enctype="multipart/form-data">
			    	@csrf
			    	<input type="hidden" name="tripId" class="form-control" value="{{$tripId}}">
			    	<input type="hidden" name="quantity" class="form-control" value="{{$quantity}}">
			    	<input type="hidden" name="price" class="form-control" value="{{$price}}">

	                <div class="modal-footer d-flex justify-content-left">
                    	<button type="submit" class="btn btn-info btn-block">Proceed to Stripe Payment</button>
                	</div>

	            </form>
	            
			</div>
			
		</div>
	</div>
</div>


@endsection