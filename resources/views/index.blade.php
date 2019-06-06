@extends('layouts.app')

@section('content')
{{-- BOOKING AREA --}}
<div class="row mx-5">
	<div class="col-lg-2 col-md-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">SEARCH TRIPS</h4>
				<form method="POST" action="/trips/search" enctype="multipart/form-data">
            	@csrf
					<div class="md-form my-2">
						<label data-error="wrong" data-success="right" for="origin">Origin</label>
                        <input id="origin" type="text" class="form-control{{ $errors->has('origin') ? ' is-invalid' : '' }}" name="origin" value="{{ old('origin') }}" required autofocus>

                        @if ($errors->has('origin'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('origin') }}</strong>
                            </span>
                        @endif
              

	                </div>
	                <div class="md-form my-2">
	                 	<label data-error="wrong" data-success="right" for="destination">Destination</label>
                        <input id="destination" type="text" class="form-control{{ $errors->has('destination') ? ' is-invalid' : '' }}" name="destination" value="{{ old('destination') }}" required autofocus>

                        @if ($errors->has('destination'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('destination') }}</strong>
                            </span>
                        @endif
	                </div>
	                <div class="md-form my-2">
	                	<label data-error="wrong" data-success="right" for="startDate">Start Date</label>
                      <input id="startDate" type="date" class="form-control{{ $errors->has('startDate') ? ' is-invalid' : '' }}" name="startDate" value="{{ old('startDate') }}" required autofocus>

                        @if ($errors->has('startDate'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('startDate') }}</strong>
                            </span>
                        @endif	                
                    </div>
                    <label data-error="wrong" data-success="right" for="quantity">No. of Passengers</label>
					<div class="input-group">
			          	<span class="input-group-btn">
			              	<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quantity">
			                  <span class="glyphicon glyphicon-minus" aria-hidden="true">-</span>
			              	</button>
			          	</span>
			          	<input type="text" name="quantity" class="form-control input-number" value="1" min="1" max="40">
			          	<span class="input-group-btn">
			              	<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity">
			                  	<span class="glyphicon glyphicon-plus " aria-hidden="true">+</span>
			              	</button>
			         	</span>
			        </div>



	                <div class="modal-footer d-flex justify-content-left">
                    	<button type="submit" class="btn btn-danger btn-block">Search</button>
                	</div>


	            </form>
			</div>
			
		</div>
	</div>
	{{-- CAROUSEL --}}
	<div class="col-lg-10 col-md-6">
		<div id="main" class="carousel slide" data-ride="carousel">

		  <!-- Indicators -->
			 <ul class="carousel-indicators">
			    <li data-target="#main" data-slide-to="0" class="active"></li>
			    <li data-target="#main" data-slide-to="1"></li>
			    <li data-target="#main" data-slide-to="2"></li>
			    <li data-target="#main" data-slide-to="3" class=""></li>
			    <li data-target="#main" data-slide-to="4"></li>
			 </ul>

			  <!-- The slideshow -->
			 <div class="carousel-inner">
			    <div class="carousel-item active">
			      	<img src="{{url('/images/tourism1.jpg')}}" alt="Ph tourism">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{url('/images/tourism2.jpg')}}" alt="Ph tourism">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{url('/images/tourism3.jpg')}}" alt="New Ph tourism">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{url('/images/tourism4.jpg')}}" alt="New Ph tourism">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{url('/images/tourism5.jpg')}}" alt="New Ph tourism">
			    </div>
			 </div>

			  <!-- Left and right controls -->
			 <a class="carousel-control-prev" href="#main" data-slide="prev">
			    <span class="carousel-control-prev-icon"></span>
			 </a>
			 <a class="carousel-control-next" href="#main" data-slide="next">
			    <span class="carousel-control-next-icon"></span>
			 </a>
		</div>
	</div>
</div>

{{-- CAROUSEL --}}
<br>
<div class="row mx-3">

	<div class="col-lg-3">
		<h4 class="card-title text-center"><b>MLN EXPRESS FLEET</b></h4>
		<div id="sub" class="carousel slide" data-ride="carousel">

		  <!-- Indicators -->
			 <ul class="carousel-indicators">
			    <li data-target="#sub" data-slide-to="0" class="active"></li>
			    <li data-target="#sub" data-slide-to="1"></li>
			    <li data-target="#sub" data-slide-to="2"></li>
			    <li data-target="#sub" data-slide-to="3" class=""></li>
			    <li data-target="#sub" data-slide-to="4"></li>
			 </ul>

			  <!-- The slideshow -->
			 <div class="carousel-inner">
			    <div class="carousel-item active">
			      	<img src="{{url('/images/bus1.jpg')}}" alt="Ph bus" class="thumbnailpic">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{url('/images/bus2.jpg')}}" alt="Ph bus" class="thumbnailpic">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{url('/images/bus3.jpg')}}" alt="New Ph bus" class="thumbnailpic">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{url('/images/bus4.jpg')}}" alt="New Ph bus" class="thumbnailpic">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{url('/images/bus5.jpg')}}" alt="New Ph bus" class="thumbnailpic">
			    </div>
			    <div class="carousel-item">
			      	<img src="{{url('/images/bus6.jpg')}}" alt="New Ph bus" class="thumbnailpic">
			    </div>
			 </div>

			  <!-- Left and right controls -->
			 <a class="carousel-control-prev" href="#sub" data-slide="prev">
			    <span class="carousel-control-prev-icon"></span>
			 </a>
			 <a class="carousel-control-next" href="#sub" data-slide="next">
			    <span class="carousel-control-next-icon"></span>
			 </a>
		</div>
	</div>

	<div class="col-lg-8 col-sm-12">
		{{-- PENDING TRIPS --}}
		<div class="accordion" id="genericAccordion_01">
            <div class="align-middle" id="DisplayGenericAccordion_01">
                <button class="btn btn-outline-success btn-lg btn-block" type="button" data-toggle="collapse" data-target="#collapsePart_01" aria-expanded="true" aria-controls="collapsePart_01">
                    <h4>Scheduled Trips</h4>
                </button>
            </div>
            <div id="collapsePart_01" class="collapse show px-0" aria-labelledby="DisplayGenericAccordion_01" data-parent="#genericAccordion_01">
				<table class="table table-hover table-responsive-">
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
									<td>{{Carbon\Carbon::parse($trip->startDate)->format('m-d-Y h:m:s')}}</td>
									<td>{{Carbon\Carbon::parse($trip->endDate)->format('m-d-Y h:m:s')}}</td>
									<td>{{$trip->price}}</td>
									<td>{{$trip->seats}}</td>
									<td>
										<form method="POST" action="/bookings/summary">
                                            @csrf
     										<input type="hidden" name="tripId" value="{{$trip->_id}}">
     										<input type="hidden" name="price" value="{{$trip->price}}">
											<div class="input-group">
									          	<span class="input-group-btn">
									              	<button type="button" class="btn btn-default btn-number {{$trip->_id}}" disabled="disabled" data-type="minus" data-field="quantity">
									                  <span class="glyphicon glyphicon-minus">-</span>
									              	</button>
									          	</span>
									          	<input type="text" name="quantity" class="form-control input-number {{$trip->_id}}" value="1" min="1" max="40">
									          	<span class="input-group-btn">
									              	<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity">
									                  	<span class="glyphicon glyphicon-plus">+</span>
									              	</button>
									         	</span>
									        </div>
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



@endsection