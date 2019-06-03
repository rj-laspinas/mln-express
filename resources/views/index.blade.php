@extends('layouts.app')

@section('content')
{{-- BOOKING AREA --}}
<div class="row mx-5">
	<div class="col-lg-2 col-md-6">
		<div class="card">
			<div class="card-body">
				<h4 class="card-title">BOOK TRIP</h4>
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
			                  <span class="glyphicon glyphicon-minus"></span>
			              	</button>
			          	</span>
			          	<input type="text" name="quantity" class="form-control input-number" value="1" min="1" max="40">
			          	<span class="input-group-btn">
			              	<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity">
			                  	<span class="glyphicon glyphicon-plus"></span>
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
	<div class="col-lg-9 col-md-6">
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
											              	<button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="quantity">
											                  <span class="glyphicon glyphicon-minus"></span>
											              	</button>
											          	</span>
											          	<input type="text" name="quantity" class="form-control input-number" value="1" min="1" max="40">
											          	<span class="input-group-btn">
											              	<button type="button" class="btn btn-default btn-number" data-type="plus" data-field="quantity">
											                  	<span class="glyphicon glyphicon-plus"></span>
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
	</div>
</div>

{{-- CAROUSEL --}}
<div class="row">
	
</div>



@endsection