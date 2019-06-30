<!DOCTYPE html>
<html>
<head>
	<title>explore</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>

    <script type='text/javascript' src='unitegallery/js/unitegallery.min.js'></script>
    <script type='text/javascript' src='unitegallery/themes/tiles/ug-theme-tiles.js'></script>
    
    <link rel='stylesheet' href='unitegallery/css/unite-gallery.css' type='text/css' />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/v4-shims.css">	
	<link rel="stylesheet" href="css/nav.css">
	<link rel="stylesheet" href="css/sidelit.css">
	<link rel="stylesheet" href="css/explore.css">

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img id="brand" src="img/eze_logo_c.png" alt="company logo">
			</div>

			<div class="col-md-4">
				<div class="nav">
						<i class="fas fa-compass" id="i" onclick="location='http://127.0.0.1:8000/filter'"></i>
						<i class="fas fa-globe-africa i" id="i" onclick="location='http://127.0.0.1:8000/explore'"></i>
						<i class="fas fa-user" id="i" onclick="location='http://127.0.0.1:8000/profile'"></i>
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
							<div class="explore">							
								<div id="nav-content">
									<div class="nav-content">
										<div id="gallery" style="display:none;">
											@foreach( $posts as $post)
												<img alt="Image 1 Title" src="/storage/{{ $post }}"
													data-image="/storage/{{ $post }}"
													data-description="Image 1 Description">
											@endforeach
										</div>
									</div>			
								</div>
							</div>

						@endif
					</div>
				</div>
				<div class="col-md-3">
{{-- 					<div class="side-lit">
						<div class="chal-notify">
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/b.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status" style="margin-top: 20px;">
											<b>Erick Mafole </b>
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/c.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status" style="margin-top: 20px;">
											<b>Hassan Masinde </b>
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/d.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status" style="margin-top: 20px;">
											<b>Manyamanya </b>
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/e.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status" style="margin-top: 20px;">
											<b>Bill Gates </b>
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/u.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status" style="margin-top: 20px;">
											<b>Steve Jobs </b>
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/opp.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status" style="margin-top: 20px;">
											<b>Walt Disney </b>
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/us.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status" style="margin-top: 20px;">
											<b>Lukelo_Jose </b>
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/f.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status" style="margin-top: 20px;">
											<b>Warren Buffet </b>
										</div>
									</div>
								</div>
								<hr>
							</div>							
						</div>	
						<br>
						<div class="lit-notify">
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/b.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status">
											<b>Erick Mafole </b>lit your challenge
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/c.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status">
											<b>Hassan Masinde </b>lit your challenge
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/d.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status">
											<b>Manyamanya </b>lit your challenge
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/e.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status">
											<b>Bill Gates </b>lit your challenge
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/u.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status">
											<b>Steve Jobs </b>lit your challenge
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/opp.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status">
											<b>Walt Disney </b>lit your challenge
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/us.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status">
											<b>Lukelo_Jose </b>lit your challenge
										</div>
									</div>
								</div>
								<hr>
							</div>
							<div class="status">
								<div class="row">
									<div class="col-md-3">
										<div class="avatar">
											<img id="side-avatar" src="img/f.jpg" alt="company logo">
										</div>
									</div>
									<div class="col-md-9">
										<div class="side-status">
											<b>Warren Buffet </b>lit your challenge
										</div>
									</div>
								</div>
								<hr>
							</div>							
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
	<script src="js/nav.js"></script>
	<script src="js/explore.js"></script>
</body>
</html>