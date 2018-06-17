<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>{{ env('APP_NAME') }}</title>

		<!-- Fonts -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="{{ asset('/css/app.css') }}">
	</head>
	<body>
		<div class="flex-center position-ref full-height">
			@if (Route::has('login'))
				<div class="top-right links">
					@auth
						<a href="{{ url('/home') }}">Home</a>
					@else
						<a href="{{ route('login') }}">Login</a>
						<a href="{{ route('register') }}">Register</a>
					@endauth
				</div>
			@endif
			{{-- App Start --}}
			<div class="content" id="app">
				<div class="title m-b-md">
					{{ env('APP_NAME') }}
				</div>
				<div class="container">
					{{-- Add Container --}}
					<div class="row justify-content-center">
						<div class="col-md-4">
							<form method="get" accept-charset="utf-8" class="form-inline">
								<div class="form-group mb-2">
									<label for="new_site">Add Site</label>
									<input class="form-control" type="text" name="new_site" placeholder="URL" @click="addSite($event.target.value)" />
								</div>
							</form>
						</div>
					</div>

					{{-- Sites --}}
					<site v-for="s in sites" :key="s.id" :insite="s"></site>
				</div>
			</div>
			{{-- End of App --}}
		</div>

		{{-- Scripts --}}
		<script src="{{ asset('/js/app.js') }}" type="text/javascript" charset="utf-8"></script>

	</body>

</html>