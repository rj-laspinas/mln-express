@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col lg-6">
			<h1>User Login</h1>
			<form  class="form-group" method="POST" action="/login">
				@csrf
				<label class="form-label" for="email">Email:</label>
				<input type="email" name="email" class="form-control" id="email">
				<br>
				<input class="form-control" type="password" name="password" id="password">
				<br>
				<button type="submit">Login</button>
			</form>
		</div>
	</div>
</div>


@endsection