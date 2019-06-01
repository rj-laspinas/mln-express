@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6 col-md-8 col-sm-12">
			<h1>User Registration Form</h1>
			<form  class="form-group" method="POST" action="/register">
				@csrf
{{-- 				<label class="form-label" for="fname">First Name</label>
				<input type="fname" name="fname" class="form-control" id="fname">
				<br>
				<label class="form-label" for="lname">Last Name</label>
				<input type="email" name="email" class="form-control" id="email">
				<br>
				<label class="form-label" for="mobile">Mobile Number</label>
				<input type="email" name="email" class="form-control" id="email">
				<br>
				<label class="form-label" for="email">Email</label>
				<input type="email" name="email" class="form-control" id="email">
				<br>
				<input class="form-control" type="password" name="password" id="password">
				<br>
				<button type="submit">Register</button>

 --}}
				        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Firt Name') }}</label>

                            <div class="col-md-6">
                                <input id="fname" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="fname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('fname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="lname" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="lname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('lname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

                            <div class="col-md-6">
                                <input id="mobile" type="Number" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="mobile" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('mobile'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
			</form>
		</div>
	</div>
</div>


@endsection