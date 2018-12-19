@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-6">
            <div class="card">
				<div class="card-header">Model</div>
				<div class="card-body">
					<form method="POST" action="/response/update" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group row">
							<div class="col-md-1"></div>
							<label for="qaPair">QA Pair : </label>
							<div class="col-md-6">
								<input id="qaPair" type="file" name="qaPair" class="form-control-file" accept=".json" required>                             
							</div>
							<div class="col-md-2">
								<a href="{{ $qapairFile['url'] }}" download>{{ $qapairFile['fileName'] }}</a>
							</div>
						</div>
						<div class="form-group row">
							<div class="col-md-12 offset-md-5">
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
