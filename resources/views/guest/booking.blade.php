@extends('layouts.app')

@section('content')
            @if(Session::has('error'))
                <div class="alert {{Session::get('alert-class')}} alert-dismissible fade show align float-right" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

 <div class="row mx-3">

        <div class="col-lg-4 col-md-6 col-sm-12 white-background modal-content">
            <h4 class="my2"><b>Customer Details</b></h4>
            <p>Please complete the necessary information to proceed with transaction.</p>
            <form  class="form-group" method="POST" action="/bookings/guest/summary">
                @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Confirm Details
                                </button>
                            </div>
                        </div>
            </form>
        </div>
    {{-- TRIP SUMMARY --}}
        <div class="col-lg-4 col-md-6">
            <h4 class="card-title "><b>Trip Details Summary</b></h4>            

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
        </div>

</div>
@endsection
