@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<table class="table">
			<thead>
				<tr>
					<th> Destination</th>
					<th> Description</th>
					<th> Maximum Number of Pax</th>
					<th> Duration</th>
					<th> Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($results as $result)
				<tr>
					<td> {{$result->destination}}</td>
					<td> {{$result->description}}</td>
					<td> {{$result->maxPax}}</td>
					<td> {{$result->duration}}</td>
					<td> {{$result->price}}</td>
					<td>
						<a href="/tours/{{$result->_id}}/edit" class="btn btn-info">
							Edit Tour
						</a>
						<form method="POST" action="/tours/{{$result->_id}}">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger" type="submit">Delete Tour</button>
						</form>
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>

@endsection