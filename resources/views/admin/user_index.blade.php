@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<table class="table table-hover table-responsive">
			<thead>
				<th>#</th>
				<th>Name</th>
				<th>Email</th>
				<th>Access Level</th>
				<th>Actions</th>
			</thead>
			<tbody>
				
				@foreach($users as $user)
				<tr>
					<td>{{$user->id}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->email}}</td>
					<td>
					
						@if($user->isAdmin == 'true')
							<span class="btn-outline-primary"><b>Administrator</b></span>
						@else
							User-only
						@endif
					</td>
					<td>
{{-- 						<form action="/users/{{$user->id}}/edit" method="GET">
							<button type="button" class="btn" data-toggle="modal" data-target="#modalEditUser">
	                                Edit
	                        </button> --}}
						</form>

					</td>
				<tr>
				@endforeach
				
			</tbody>
		</table>
		
	</div>
</div>

@endsection