<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta name="viewport" content="width=device-width">
	<meta name="description" content="Create an account or log in to Eze. Discover competitions, approve battles, gain confidence & join the challenge.">
	<title>Eze: New era of competition</title>
	<link rel="stylesheet" href="{{ URL::asset('css/minified/landing.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/v4-shims.css">	
</head>

<body>
	<div class="box gradDynamic">
		<div class="container">		
			<div class="row">
				<img id="brand" src="{{ URL::asset('img/eze_logo.png') }}" alt="">
			</div>
			<br>
			<br>
			<div class="row">
				<div class="col-md-8">
					<div class="laptop">
					  <div class="content">
					    <iframe title="landing" src="{{ route('landing') }}" style="width:100%;border:none;height:100%" >
					    </iframe>
					  </div>
					</div>	
				</div>
				<div class="col-md-4">			
					<div class="login form-card">
						<nav align="center">
							<i class="fa fa-address-book fa-lg"></i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<i class="fa fa-user fa-lg"></i>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<i class="fa fa-key fa-lg"></i>
						</nav>
						{{-- form registration--}}
						<div class="form">
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ URL::asset('js/minified/landing.min.js') }}"></script>
</body>
</html>