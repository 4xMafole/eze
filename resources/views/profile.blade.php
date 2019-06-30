<!DOCTYPE html>
<html>
<head>
	<meta name="_token" content="{{csrf_token()}}" />

	<title>profile</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/v4-shims.css">	

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

    <script type='text/javascript' src='{{ URL::asset('unitegallery/js/unitegallery.min.js') }}'></script> 
	<script type='text/javascript' src='{{ URL::asset('unitegallery/themes/tiles/ug-theme-tiles.js') }}'></script>
    
	<link rel='stylesheet' href='{{ URL::asset('unitegallery/css/unite-gallery.css') }}' type='text/css' /> 
	<link rel="stylesheet" href="{{ URL::asset('css/nav.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/sidelit.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/profile.css') }}">


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
						<i class="fas fa-globe-africa" id="i" onclick="location='http://127.0.0.1:8000/explore'"></i>
						<i class="fas fa-user i" id="i" onclick="location='http://127.0.0.1:8000/profile'"></i>
				</div>
			</div>
			<div class="col-md-4">
				<div class="setting">
					<i class="fas fa-pencil-alt control edit-ctrl"></i>

					<i class="fas fa-cog control" style="margin-left: 80%;"></i>
					
					<ul class="list" style="list-style-type: none;">
						<li>
							<a href="{{ route('privacy') }}" rel="modal:open" class="link">Privacy</a>
						</li>
						<li>
							<a href="{{ route('terms') }}" rel="modal:open" class="link">Terms & Conditions</a>
						</li>
						<li>
							<a href="{{ route('aboutus') }}" rel="modal:open" class="link">About Us</a>
						</li>
						<li>
							<a href="{{ route('logout') }}" class="link">Log out</a>
						</li>
					</ul>
				</div>

			</div>
		</div>
	<div id="modal-view">

		<div id="shots" class="modal">
			<div class="navigators">
				<a href="#shots" rel="modal:open">
					<i class="fas fa-camera nav-selector-active" style="float: left;"></i>
				</a>
				<a href="#challenges" rel="modal:open">
					<i class="fas fa-grip-vertical nav-selector"  style="float: right;"></i>
				</a>
			</div>
			<br>
			<div id="nav-content">
				<div class="nav-content">
					<div id="gallery" style="display:none;">
						@if($post->contains(Auth::id()))
							@foreach($user_id->post->reverse() as $shot)
								<img alt="Image 1 Title" src="/storage/{{ $shot->post }}"
									data-image="/storage/{{ $shot->post }}"
									data-description="Image 1 Description">
							@endforeach
						@else
							{{-- Say something here if user has no post in the shots gallary --}}
							Gallary is empty!
						@endif	
					</div>
				</div>			
			</div>
		</div>

		<div id="challenges" class="modal">
		</div>
	</div>
	{{-- username edit --}}
	<div id="username-edit" class="modal">
		<form method="post" action="{{ route('username-edit') }}" >
			<input type="text" name="username" autocomplete="off" placeholder="{{ Auth::user()->username }}">
			<input type="hidden" name="_token" value="{{ Session::token() }}">
			<button><i class="fas fa-archive control edits"></i></button>
			<span id="warn">*min: 5 characters.</span>
		</form>
	</div>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="content">
						<div class="profile" data-userid="{{ Auth::id() }}">

							<form method="post" action="{{ route('avatar-edit') }}" enctype="multipart/form-data">
								<div style="height: 0px; overflow: hidden;">
									<input type="file" name="avatar" id="avatarInput">
									<button id="button"></button>
								</div>
								<i class="fas fa-plus-square control edits" id="img-edit"></i>
								{{ csrf_field() }}
							</form>					

							<div class="user-avatar">
								@if($avatar->contains(Auth::id()))
									<img id="pro-avatar" src="/storage/{{ $user_id->avatar->avatar }}" alt="Erick Mafole">
								@else
									<img id="pro-avatar" src="{{ URL::asset('img/avatar.png') }}" alt="Erick Mafole">	
								@endif
								<div class="user-name" align="center">
									<element>
										{{ Auth::user()->username }}
									</element>
									<a class="link" href="#username-edit" rel="modal:open">
										<i class="fas fa-pencil-alt control edits" id="usernm-edit"></i>
									</a>
								</div>
							</div>
							<div class="user-details">

								<div class="row detail-number" align="center">
									<div class="col-md-4">
										{{ $user_id->post()->get()->count()}}
									</div>
									<div class="col-md-4" id="followers">
										{{ auth()->user()->followers()->get()->count() }}
									</div>
									<div class="col-md-4">
										{{ $user_id->challenge_post()->get()->count() + $user_id->challenged_post()->get()->count() }}
									</div>
								</div>
								<div class="row detail-name" align="center" >
									<div class="col-md-4">
										shots
									</div>
									<div class="col-md-4">
										followers
									</div>
									<div class="col-md-4">
										challenges
									</div>
								</div>
							</div>

{{-- 							<div class="follow-btn" data-userid="{{ Auth::id() }}">
								@if(auth()->user()->isFollowing(Auth::id()))
									<div class="following">
										Following
									</div>
								@else
									<div class="follow">
										Follow
									</div>
								@endif
							</div> --}}
							
						</div>
						<div class="panel">
							<div class="navigators">
								<a href="#shots" rel="modal:open">
									<i class="fas fa-camera nav-selector" style="float: left;"></i>
								</a>
								<a href="#challenges" rel="modal:open">
									<i class="fas fa-grip-vertical nav-selector"  style="float: right;"></i>
								</a>
							</div>
						</div>
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
	<script src="js/profile.js"></script>
</body>
</html>