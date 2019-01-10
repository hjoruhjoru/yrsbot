@extends('layouts.app')
@section('content')
<div class="container">
	<header class="major">
		<h2>Model</h2>
		<p>update your dialogue response model</p>
	</header>
	<section>
		<form method="POST" action="/response/update" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="row">
				<div class="3u 12u$(small)"></div>
				<div class="9u 12u$(small)">
					<ul class="actions">
						<li>QA Pair : </li>
						<li><input id="qaPair" type="file" name="qaPair" class="form-control-file" accept=".json" required></li>
						<li><a href="{{ $qapairFile['url'] }}" download>{{ $qapairFile['fileName'] }}</a></li>
					</ul>
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
</div>
@endsection
