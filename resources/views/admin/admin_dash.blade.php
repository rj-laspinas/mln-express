@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col lg-6">
			<h1>User Login</h1>
			<form  class="form-group" method="POST" action="/admin/tours">
				@csrf
				<label class="form-label" for="destination">Destination</label>
				<input type="text" name="destination" class="form-control" id="destination">
				<label class="form-label" for="description">Description</label>
				<input type="text" name="description" class="form-control" id="description">
				<label class="form-label" for="maxPax">Maximum Number</label>
				<input type="number" name="maxPax" class="form-control" id="maxPax">
				<label class="form-label" for="duration">Duration</label>
				<input type="number" name="duration" class="form-control" id="duration">
				<label class="form-label" for="price">Price</label>
				<input type="number" name="price" class="form-control" id="price"><br>
				<button type="submit" class=" btn btn-info">Add New Tour</button>
			</form>
		</div>
	</div>
</div>


@endsection