@extends('layouts.app')

@section('content')


<div class="container">
	<div class="row">
		<table class="table table-hover table-responsive">
			<thead>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
				<th>User Access</th>
				<th>Actions</th>
			</thead>
			<tbody>
				
				@foreach($users as $user)
				<tr>
					<td>{{$user->lname}}, {{$user->fname}}</td>
					<td>
						@if($user->isGuest == false)
							{{$user->email}}
						@else
							{{$user->isGuest}}

					</td>
					<td>{{$user->mobile}}</td>
					<td>
					
						@if($user->isAdmin == 'true')
							<form action="/users/{{$user->_id}}/edit" method="GET">
								@csrf
								<button type="button" class="btn btn-outline-info">
		                                Administrator
		                        </button>
							</form>
						@elseif($user->isAdmin == 'false' && $user->guest == 'true' )
							<form action="/users/{{$user->_id}}/edit" method="POST">
								@csrf
								<button type="button" class="btn btn-outline-success">
		                                Customer
		                        </button>
							</form>
						@else
							<span class="btn-outline-warnig"><b>Guest</b></span>

						@endif
					</td>
					<td>
						@if($user->isActive == true)
							<form action="/users/{{$user->_id}}" method="POST">
								@csrf
								@method('DELETE')
								<button type="button" class="btn btn-success">
		                                Account Active
		                        </button>
							</form>
						@else 
							<form action="/users/{{$user->_id}}" method="POST">
								@csrf
								@method('DELETE')
								<button type="button" class="btn btn-info">
		                                Account Disabled
		                        </button>
							</form>
						@endif

					</td>
				<tr>
				@endforeach
				
			</tbody>
		</table>
		
	</div>
</div>

@endsection