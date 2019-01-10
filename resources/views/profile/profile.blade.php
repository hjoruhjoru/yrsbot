@extends('layouts.app')
@section('content')
<div class="container">
	<header class="major">
		<h2>General Information</h2>
		<p>User general information</p>
	</header>
	<section>
		<form method="post" action="/profile/update" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row uniform">
				<div class="2u 12u$(small)">
					<label for="name">Name:</label>
				</div>
				<div class="4u 12u$(small)">
					<input id="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::user()->name }}" required autofocus>
				</div>
				<div class="2u 12u$(small)">
					<label for="email">Email address:</label>
				</div>
				<div class="4u 12u$(small)">
					<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::user()->email }}" required autofocus disabled>
				</div>
				<div class="2u 12u$(small)">
					<label for="password">Password:</label>
				</div>
				<div class="4u 12u$(small)">
					<input id="password" type="password" name="password" required> 
				</div>
				<div class="2u 12u$(small)">
					<label for="checkpassword">Confirm Password:</label>
				</div>
				<div class="4u 12u$(small)">
					<input id="confirmPassword" type="password" name="confirmPassword" required>
				</div>
				<div class="2u 12u$(small)">
					<label for="headshot">Head Shot:</label>
				</div>
				<div class="3u 12u$(small)">
					<input id="headshot" type="file" name="headshot" accept=".jpg,.gif,.png" required>
				</div>
				<div class="1u 12u$(small)">
					<a href="{{ $headshotUrl }}" download>{{ $headshotFileName }}</a>
				</div>
				<div class="2u 12u$(small)">
					<label for="checkpassword">Chatbot Head Shot:</label>
				</div>
				<div class="3u 12u$(small)">
					<input id="chatbotheadshot" type="file" name="chatbotheadshot" class="form-control-file" accept=".jpg,.gif,.png" required>     
				</div>
				<div class="1u 12u$(small)">
					<a href="{{ $chatbotheadshotUrl }}" download>{{ $chatbotheadshotFileName }}</a>
				</div>
			</div>
			<div class="row">
				<div class="5u 12u$(small)"></div>
				<div class="7u 12u$(small)">
					<ul class="alt">
						<li><button type="submit"  class="button">update</button></li>
					</ul>
				</div>
			</div>
		</form>
	</section>
	<!--div class="row justify-content-center">
		<div class="col-md-8">
            <div class="card">
				<div class="card-header">General Information</div>
				<div class="card-body">
					<form method="POST" action="/profile/update" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						
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
	</div-->
</div>
@endsection
