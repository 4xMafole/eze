<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta name="viewport" content="width=device-width">

	<meta name="_token" content="{{csrf_token()}}" />

	<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
	<link rel="manifest" href="icons/site.webmanifest">
	<link rel="mask-icon" href="icons/safari-pinned-tab.svg" color="#bf1d1d">
	<meta name="msapplication-TileColor" content="#b91d47">
	<meta name="theme-color" content="#ffffff">

	<title>profile</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/v4-shims.css">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

    <script type='text/javascript' src='{{ URL::asset('unitegallery/js/unitegallery.min.js') }}'></script>
	<script type='text/javascript' src='{{ URL::asset('unitegallery/themes/tiles/ug-theme-tiles.js') }}'></script>

	<link rel='stylesheet' href='{{ URL::asset('unitegallery/css/unite-gallery.min.css') }}' type='text/css' />
	<link rel="stylesheet" href="{{ URL::asset('css/minified/nav.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/minified/sidelit.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/minified/profile.min.css') }}">


</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img id="brand" src="{{ URL::asset('img/eze_logo_c.svg') }}" alt="company logo">
			</div>
			<div class="col-md-4">
				<div class="nav">
						<i class="fas fa-compass" id="i" onclick="location='{{ route('filter')}}'"></i>
						<i class="fas fa-globe-africa" id="i" onclick="location='{{ route('explore')}}'"></i>
						<i class="fas fa-user " id="i" onclick="location='{{ route('profile')}}'"></i>
				</div>
			</div>
		</div>
		<div id="modal-view">

			<div id="shots" class="modal">
				<div class="navigators">
					<a href="#shots" rel="modal:open">
						<i class="fas fa-camera nav-selector-active" style="float: left;"></i>
					</a>
					<a href="#challenge" rel="modal:open">
						<i class="fas fa-grip-vertical nav-selector"  style="float: right;"></i>
					</a>
				</div>
				<br>
				<div id="nav-content">
					<div class="nav-content">
						<div id="gallery" style="display:none;">
							@if($post->contains($user_id->id))
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

			<div id="challenge" class="modal">

			</div>
		</div>
			<div class="container">
				<div class="row">
					<div class="col-md-9">
						<div class="content">
							<div class="profile" data-userid="{{$user_id->id}}">

								<form method="post" action="{{ route('avatar-edit') }}" enctype="multipart/form-data">
									<div style="height: 0px; overflow: hidden;">
										<input type="file" name="avatar" id="avatarInput">
										<button id="button"></button>
									</div>
									<i class="fas fa-plus-square control edits" id="img-edit"></i>
									{{ csrf_field() }}
								</form>

								<div class="user-avatar">
									@if($avatar->contains($user_id->id))
										<img class="search-usrs" id="pro-avatar" src="/storage/{{ $user_id->avatar->avatar }}" alt="Erick Mafole">
									@else
										<img id="pro-avatar" src="{{ URL::asset('img/avatar.png') }}" alt="Erick Mafole">
									@endif
									<div class="user-name" align="center">
										<element>
											{{ $user_id->username }}
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
											{{ $user_id->followers()->get()->count() }}
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

								@if($user_id->id != Auth::id())
									<div class="follow-btn">
										@if(auth()->user()->isFollowing($user_id->id))
											<div class="following">
												Following
											</div>
										@else
											<div class="follow">
												Follow
											</div>
										@endif
									</div>
								@endif

							</div>

							@if($user_id->id != Auth::id())
								<div id="panel">
									<div class="navigators">
										<a href="#shots" rel="modal:open">
											<i class="fas fa-camera nav-selector" style="float: left;"></i>
										</a>
										<a href="#challenge" rel="modal:open">
											<i class="fas fa-grip-vertical nav-selector"  style="float: right;"></i>
										</a>
									</div>
								</div>
							@else
								<div class="panel">
									<div class="navigators">
										<a href="#shots" rel="modal:open">
											<i class="fas fa-camera nav-selector" style="float: left;"></i>
										</a>
										<a href="#challenge" rel="modal:open">
											<i class="fas fa-grip-vertical nav-selector"  style="float: right;"></i>
										</a>
									</div>
								</div>
							@endif

						</div>
					</div>
				</div>
			</div>
	</div>
	<script src="{{ URL::asset('js/nav.js') }}"></script>
	<script src="{{ URL::asset('js/profile.js') }}"></script>

</body>
</html>
