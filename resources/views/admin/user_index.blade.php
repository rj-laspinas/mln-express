@extends('layouts.app')

@section('content')
	
	<div class="row mx-4">
		<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
				Administators
			</a>
			<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
				Register Customers
			</a>
			<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
				Unregister/Guests
			</a>

		</div>

{{-- CONTENT/ USER TYPES --}}
		<div class="tab-content" id="v-pills-tabContent">
	{{--ADMINISTRATOR ACCOUNTS  --}}
			<div class="tab-pane fade show active mx-auto" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

					<h4 ><span class="mx-5 card-title">Administrator Accounts</span></h4>
					<table class="table table-hover table-responsive mx-4">
						<thead>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>User Access</th>
							<th>Actions</th>
						</thead>
						<tbody>
							<col width="250">
							<col width="200">
							<col width="130">
							<col width="130">
							<col width="130">
							@foreach($users as $user)
								@if($user->isAdmin == true && $user->isGuest == "false")
									<tr>
										<td>{{$user->lname}}, {{$user->fname}}</td>
										<td>
											@if($user->isGuest == "false")
												{{$user->email}}
											@else
												{{$user->isGuest}}
											@endif

										</td>
										<td>{{$user->mobile}}</td>
										<td>
										
											@if($user->isAdmin == true)
												<a href="/users/{{$user->_id}}/edit">
													<button type="button" class="btn btn-outline-info btn-block">
							                                Administrator
							                        </button>
												</a>
											@elseif($user->isAdmin == false && $user->isGuest == "false" )
												<a href="/users/{{$user->_id}}/edit">
													<button type="button" class="btn btn-outline-success btn-block">
							                                Customer
							                        </button>
												</a>
											@else
												<span class="btn-outline-warning btn-block"><b>Guest</b></span>

											@endif
										</td>
										<td>
											@if($user->isActive == true)
												<form method="POST" action="/users/{{$user->_id}}">
					                                @csrf
					                                @method('DELETE')
					                                <button class="btn btn-success ">Account Active</button>
					                            </form>
					                  
											@else 
												<form action="/users/{{$user->_id}}" method="POST">
													@csrf
													@method('DELETE')
													<button  class="btn btn-danger btn-block">
							   
							                           Deactivated
							                        </button>
												</form>
											@endif

										</td>
									</tr>
									@endif
							@endforeach
							
						</tbody>
					</table>
				</div>

	{{-- REGISTERED USER ACCOUNTS --}}
			<div class="tab-pane fade mx-4" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<h4 ><span class="mx-5 card-title">Registered User Accounts</span></h4>
					<table class="table table-hover table-responsive">
						<thead>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>User Access</th>
							<th>Actions</th>
						</thead>
						<tbody>
							<col width="250">
							<col width="200">
							<col width="130">
							<col width="130">
							<col width="130">
							@foreach($users as $user)
								@if($user->isAdmin == false && $user->isGuest == "false")
									<tr>
										<td>{{$user->lname}}, {{$user->fname}}</td>
										<td>
											@if($user->isGuest == "false")
												{{$user->email}}
											@else
												{{$user->isGuest}}
											@endif

										</td>
										<td>{{$user->mobile}}</td>
										<td>
										
											@if($user->isAdmin == true)
												<a href="/users/{{$user->_id}}/edit">
													<button type="button" class="btn btn-outline-info btn-block">
							                                Administrator
							                        </button>
												</a>
											@elseif($user->isAdmin == false && $user->isGuest == "false" )
												<a href="/users/{{$user->_id}}/edit">
													<button type="button" class="btn btn-outline-success btn-block">
							                                Customer
							                        </button>
												</a>
											@else
												<span class="btn-outline-warning btn-block"><b>Guest</b></span>

											@endif
										</td>
										<td>
											@if($user->isActive == true)
												<form method="POST" action="/users/{{$user->_id}}">
					                                @csrf
					                                @method('DELETE')
					                                <button class="btn btn-success ">Account Active</button>
					                            </form>
					                  
											@else 
												<form action="/users/{{$user->_id}}" method="POST">
													@csrf
													@method('DELETE')
													<button  class="btn btn-danger btn-block">
							   
							                           Deactivated
							                        </button>
												</form>
											@endif

										</td>
									</tr>
									@endif
							@endforeach
							
						</tbody>
					</table>
				</div>
	{{-- UNREGISTERED USERS / GUESTS --}}
			<div class="tab-pane fade mx-auto" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					<h4 ><span class="mx-5 card-title">Guest / Unregistered User Accounts</span></h4>
					<table class="table table-hover table-responsive">
						<thead>
							<th>Name</th>
							<th>Email</th>
							<th>Mobile</th>
							<th>User Access</th>
							<th>Actions</th>
						</thead>
						<tbody>
							<col width="250">
							<col width="200">
							<col width="130">
							<col width="130">
							<col width="130">
							@foreach($users as $user)
								@if($user->isAdmin == false && $user->isGuest !== "false")
									<tr>
										<td>{{$user->lname}}, {{$user->fname}}</td>
										<td>
											@if($user->isGuest == "false")
												{{$user->email}}
											@else
												{{$user->isGuest}}
											@endif

										</td>
										<td>{{$user->mobile}}</td>
										<td>
										
											@if($user->isAdmin == true)
												<a href="/users/{{$user->_id}}/edit">
													<button type="button" class="btn btn-outline-info btn-block">
							                                Administrator
							                        </button>
												</a>
											@elseif($user->isAdmin == false && $user->isGuest == "false" )
												<a href="/users/{{$user->_id}}/edit">
													<button type="button" class="btn btn-outline-success btn-block">
							                                Customer
							                        </button>
												</a>
											@else
												<span class="btn-outline-warning btn-block"><b>Guest</b></span>

											@endif
										</td>
										<td>
											@if($user->isActive == true)
												<form method="POST" action="/users/{{$user->_id}}">
					                                @csrf
					                                @method('DELETE')
					                                <button class="btn btn-success ">Account Active</button>
					                            </form>
					                  
											@else 
												<form action="/users/{{$user->_id}}" method="POST">
													@csrf
													@method('DELETE')
													<button  class="btn btn-danger btn-block">
							   
							                           Deactivated
							                        </button>
												</form>
											@endif

										</td>
									</tr>
									@endif
							@endforeach
							
						</tbody>
					</table>
				</div>

		</div>
	</div>
	


@endsection