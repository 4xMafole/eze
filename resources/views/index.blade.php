<!DOCTYPE html><html lang="{{str_replace('_', '-', app()->getLocale())}}">
	<head>
		<meta name="viewport" content="width=device-width">
		<meta name="google-site-verification" content="ekSHSIfub4LEv5O3tQM2lo2fvd1GDCjjWjQ8YIKv9Ec" />
		<meta name="description" content="Create an account or log in to Whyeze.Connect, discover and approve quality over quantity via competitions.">
		<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('icons/apple-touch-icon.png') }}">
		<link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('icons/favicon-32x32.png')}}">
		<link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('icons/favicon-16x16.png')}}">
		<link rel="manifest" href="{{URL::asset('icons/site.webmanifest')}}">
		<link rel="mask-icon" href="{{URL::asset('icons/safari-pinned-tab.svg')}}" color="#bf1d1d">
		<meta name="msapplication-TileColor" content="#b91d47">
		<meta name="theme-color" content="#ffffff">
		<title>Whyeze: New era of competition</title>
		{{-- <link rel="stylesheet" href="{{URL::asset('css/minified/landing.min.css')}}"> --}}
		<link rel="stylesheet" href="{{URL::asset('css/landing.css')}}">
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145413535-1"></script>
	    <script>window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-145413535-1');</script>
	    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"> 
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/v4-shims.css">
	</head>
	<body>
		<div class="box gradDynamic">
			<div class="container">
				<div class="row">
					<img id="brand" src="{{URL::asset('img/eze_logo.svg')}}" alt="">
				</div>
				<br>
				<br>
				<div class="row">
					<div class="col-md-6">
						<div class="descript">
							<h1><b>WHYEZE</b></h1>
							<h4>Connect, discover and approve quality over quantity via competitions.</h4>
						</div>
					</div>
					<div class="col-md-6">
						<div class="login form-card">
							<nav>
								<i class="fa fa-address-book fa-lg"></i>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<i class="fa fa-user fa-lg"></i>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<i class="fa fa-key fa-lg"></i>
							</nav>
							<div class="form"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="{{URL::asset('js/minified/landing.min.js')}}"></script>
	</body>
</html>
