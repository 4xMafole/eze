<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta name="viewport" content="width=device-width">

	<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
	<link rel="manifest" href="icons/site.webmanifest">
	<link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#bf1d1d">
	<meta name="msapplication-TileColor" content="#b91d47">
	<meta name="theme-color" content="#ffffff">	

	<title>explore</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    <script type='text/javascript' src='{{ URL::asset('unitegallery/js/unitegallery.min.js') }}'></script>
    <script type='text/javascript' src='{{ URL::asset('unitegallery/themes/tiles/ug-theme-tiles.js') }}'></script>
    <script src="https://kit.fontawesome.com/3a5563d1ac.js"></script>


    <link rel='stylesheet' href='{{ URL::asset('unitegallery/css/unite-gallery.min.css') }}' type='text/css' />
	<link rel="stylesheet" href="{{ URL::asset('css/minified/nav.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/minified/sidelit.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/minified/explore.min.css') }}">

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img id="brand" src="{{ URL::asset('img/eze_logo_c.png') }}" alt="company logo">
			</div>

			<div class="col-md-4">
				<div class="nav">
						<i class="fas fa-compass" id="i" onclick="location='{{route('filter')}}'"></i>
						<i class="fas fa-globe-africa i" id="i" onclick="location='{{route('explore')}}'"></i>
						<i class="fas fa-user" id="i" onclick="location='{{route('profile')}}'"></i>
				</div>
			</div>

			<div class="col-md-4">
				<form action="" class="typeahead" role="search">
					<div class="search-bar">
						<i id="search" class="fas fa-search"></i>

						<input id="search-bar" type="text" name="f" placeholder="explore..." style="
										font-family: cursive;
									    font-size: small;
									    color: #6e6e6e;
									    border-radius: 10px;
									    text-decoration-line: none;
									    padding-left: 10px;
									    background: #f3f3f3;
									    border-style: none;
									    outline-style: none;
									    box-shadow: inset 3px -2px 4px 0px #cec8c885;"
						>
					</div>
				</form>
			</div>

		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="content">
					<!-- All your content should be inserted here.. -->
						@if($posts->isEmpty())
							<p align="center" style=" font-family: cursive; font-size: small;">
								<color style="color: green;">E</color>
								<color style="color: red;">x</color>
								<color style="color: green;">p</color>
								<color style="color: purple;">l</color>
								<color style="color: pink;">o</color>
								<color style="color: green;">r</color>
								<color style="color: orange;">e</color>
								&nbsp;
								<color style="color: green;">t</color>
								<color style="color: blue;">h</color>
								<color style="color: green;">e</color>
								&nbsp;
								<color style="color: green;">w</color>
								<color style="color: blue;">o</color>
								<color style="color: red;">r</color>
								<color style="color: green;">l</color>
								<color style="color: blue;">d</color>
								!
							</p>
						@else
							<div class="search-rslts">
									{{-- here shows the user searched. --}}
							</div>
							{{-- <p><a href="#challenge" rel="modal:open">Fungua Modal</a></p> --}}
							<div class="explore">
								<div id="nav-content">
									<div class="nav-content">
										<a href="#challenge" rel="modal:open">
											<i class="fas fa-eye" style="color: #b2b4bb; position: relative; left: 50%;"></i>
										</a>
										<div id="gallery" style="display:none;">
											@foreach( $posts as $post)
												<a href="#SeeWatchButton">
													<img alt="Image 1 Title" src="/storage/{{ $post }}" data-image="/storage/{{ $post }}"data-description="{{ $post }}">
												</a>
											@endforeach
										</div>
									</div>
								</div>
							</div>
							{{-- modal --}}
							<div id="challenge" class="modal" style="padding: 10px 15px; max-width: 1000px; max-height: 41.5em; vertical-align: top; border-radius: 5px;">
							</div>
						@endif
					</div>
				</div>

				{{-- All notification comes here --}}
				<div class="col-md-3">
					<div class="side-lit">
					</div>
				</div>

			</div>
		</div>
	</div>
	<script src="{{ URL::asset('js/nav.js') }}"></script>
	<script src="{{ URL::asset('js/explore.js') }}"></script>
	<script src="{{ URL::asset('js/sidelit.js') }}"></script>
</body>
</html>
