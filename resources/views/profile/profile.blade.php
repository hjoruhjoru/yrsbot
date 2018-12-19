@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
            <div class="card">
				<div class="card-header">General Information</div>
				<div class="card-body">
					<form method="POST" action="/profile/update" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group row">
							<label for="name" class="col-md-3 col-form-label">Name:</label>
							<div class="col-md-5">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>                             
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-md-3 col-form-label">Email address:</label>
							<div class="col-md-5">
								<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required autofocus disabled>                             
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-md-3 col-form-label">Password:</label>
							<div class="col-md-5">
								<input id="password" type="password" name="password" required>                             
							</div>
						</div>
						<div class="form-group row">
							<label for="checkpassword" class="col-md-3 col-form-label">Confirm Password:</label>
							<div class="col-md-5">
								<input id="confirmPassword" type="password" name="confirmPassword" required>                             
							</div>
						</div>
						<div class="form-group row">
							<label for="headshot" class="col-md-3 col-form-label">Head Shot:</label>
							<div class="col-md-4">
								<input id="headshot" type="file" name="headshot" class="form-control-file" accept=".jpg,.gif,.png" required>                             
							</div>
							<div class="col-md-2">
								<a href="{{ $headshotUrl }}" download>{{ $headshotFileName }}</a>
							</div>
						</div>
						<div class="form-group row">
							<label for="chatbotheadshot" class="col-md-3 col-form-label">Chatbot Head Shot:</label>
							<div class="col-md-4">
								<input id="chatbotheadshot" type="file" name="chatbotheadshot" class="form-control-file" accept=".jpg,.gif,.png" required>                             
							</div>
							<div class="col-md-2">
								<a href="{{ $chatbotheadshotUrl }}" download>{{ $chatbotheadshotFileName }}</a>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-8 offset-md-4">
								<button type="submit" class="btn btn-primary">update</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
