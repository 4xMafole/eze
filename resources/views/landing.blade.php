<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta name="viewport" content="width=device-width">
		
		<link rel="stylesheet" href="{{ URL::asset('css/minified/landing.min.css') }}">
	</head>
	<body>
		<div class="landing">
			<img src="{{ URL::asset('img/landing.jpg') }}" alt="">
			<img src="{{ URL::asset('img/landing2.jpg') }}" alt="">
		</div>
	</body>
</html>