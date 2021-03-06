<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta name="viewport" content="width=device-width">

	<meta name="_token" content="{{csrf_token()}}" />

	<link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('icons/apple-touch-icon.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('icons/favicon-32x32.png')}}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('icons/favicon-16x16.png')}}">
	<link rel="manifest" href="{{URL::asset('icons/site.webmanifest')}}">
	<link rel="mask-icon" href="{{URL::asset('icons/safari-pinned-tab.svg')}}" color="#bf1d1d">
	<meta name="msapplication-TileColor" content="#b91d47">
	<meta name="theme-color" content="#ffffff">

	<title>filter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
    <script src="https://kit.fontawesome.com/3a5563d1ac.js"></script>


	<link rel="stylesheet" href="{{ URL::asset('css/minified/nav.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/minified/sidelit.min.css') }}">
	<link rel="stylesheet" href="{{ URL::asset('css/minified/filter.min.css') }}">

</head>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<img id="brand" src="{{ URL::asset('img/eze_logo_c.svg') }}" alt="company logo">
			</div>
			<div class="col-md-4">
				<div class="nav">
						<i class="fas fa-compass i" id="i" onclick="location='{{route('filter')}}'"></i>
						<i class="fas fa-globe-africa" id="i" onclick="location='{{route('explore')}}'"></i>
						<i class="fas fa-user" id="i" onclick="location='{{route('profile')}}'"></i>
				</div>
			</div>
			<div class="col-md-4">
				<div style="display: none;">
					{{-- post uploader --}}
					<form method="post" action="{{ route('poster') }}" enctype="multipart/form-data">
						<div style="height: 0px; overflow: hidden;">
							<input type="file" name="post" id="postInput">
							<button id="button"></button>
						</div>
						{{ csrf_field() }}
					</form>
					{{-- post uploader --}}

					{{-- challenge uploader --}}
					<form method="post" action="{{ route('challenge') }}" enctype="multipart/form-data">
						<div style="height: 0px; overflow: hidden;">
							<button id="challenge-uploader"></button>
						</div>
						{{ csrf_field() }}
					</form>
					{{-- challenge uploader --}}
				</div>

				<div class="setting">
					<i class="fas fa-box-open control" id="poster"></i>
					<i class="fas fa-bolt control" style="margin-left: 80%;"></i>

				</div>

			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="content">
					<!-- All your content should be inserted here.. -->
						<div class="filter">
							@if(!$challenge->isEmpty())

								@foreach($challenge as $challenge)
									<div class="challenges">
										<div class="row">
											{{-- user post --}}
											<div class="col-md-5">
												<div class="post">
													<div class="header">
														<div class="card-avatar">
															@if($challenge->user_avatar != null)
																<a href="explore/{{ $challenge->user }}">
																	<img id="avatar" src="/storage/{{ $challenge->user_avatar }}">
																</a>
															@else
																<a href="explore/{{ $challenge->user }}">
																	<img id="avatar" src="{{ URL::asset('img/avatar.jpg') }}" alt="">
																</a>
															@endif
														</div>
														<div class="username">{{ $challenge->user_name }}</div>
													</div>
													<div class="photo">
														<img src="/storage/{{ $challenge->user_post }}" alt="" id="photo">
													</div>
												</div>
											</div>
											{{-- initiator --}}
											<div class="col-md2">
												<div class="challenge-initializer">
													<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 50 50" style="fill:#bd040b;">
										            	<path style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M 15.402344 3.9394531 C 12.613668 4.0021381 10.605902 4.872253 9.4199219 6.3886719 C 8.233942 7.9050908 7.9310833 9.8839414 8.015625 11.980469 C 8.06088 13.114663 8.291174 14.312359 8.5722656 15.521484 C 8.2164063 15.985707 7.9384767 16.580133 8.0117188 17.462891 L 8.0136719 17.488281 L 8.0175781 17.515625 C 8.1485279 18.475733 8.4153101 19.176255 8.8046875 19.685547 C 8.9680261 19.899188 9.2288051 19.897331 9.4335938 20.035156 C 9.5699727 20.843924 9.788752 21.64924 10.109375 22.310547 C 10.29953 22.702755 10.504188 23.052314 10.71875 23.351562 C 10.79521 23.458196 10.919299 23.531697 10.998047 23.626953 L 10.998047 26.185547 C 10.811243 26.663617 10.30364 27.115091 9.3417969 27.566406 C 8.348387 28.032533 7.0153138 28.454454 5.6660156 29.001953 C 4.3167174 29.549452 2.9299578 30.227252 1.8359375 31.332031 C 0.7419172 32.43681 0 34.004145 0 36 A 1.0001 1.0001 0 1 0 2 36 C 2 34.465855 2.4801453 33.523596 3.2578125 32.738281 C 4.0354797 31.952966 5.1700169 31.361845 6.4179688 30.855469 C 7.6659204 30.349093 9.0081289 29.93217 10.191406 29.376953 C 11.374684 28.821736 12.503994 28.08003 12.945312 26.783203 L 12.998047 26.626953 L 12.998047 22.677734 L 12.496094 22.388672 C 12.618224 22.458652 12.472974 22.365772 12.34375 22.185547 C 12.214531 22.005326 12.055673 21.741667 11.908203 21.4375 C 11.613264 20.829167 11.360987 20.052655 11.300781 19.421875 L 11.214844 18.517578 L 10.439453 18.517578 C 10.427943 18.509017 10.427076 18.513267 10.394531 18.470703 C 10.29077 18.334988 10.107934 17.958674 10.007812 17.277344 C 9.9850465 16.75611 10.322117 16.5103 10.173828 16.609375 L 10.761719 16.216797 L 10.587891 15.53125 C 10.261581 14.243337 10.058004 13.011458 10.013672 11.900391 C 9.9392129 10.053918 10.238574 8.5896749 10.996094 7.6210938 C 11.751553 6.6551474 13.028064 5.9988504 15.431641 5.9414062 C 16.676871 5.9455862 17.803471 6.8717201 18.136719 7.4433594 L 18.380859 7.8632812 L 18.861328 7.9296875 C 19.917568 8.0779938 20.29248 8.4798167 20.599609 9.1523438 C 20.906739 9.8248706 21.005434 10.822955 21.007812 11.806641 C 21.011312 13.303818 20.547693 14.985925 20.230469 15.873047 L 19.931641 16.707031 L 20.724609 17.103516 C 20.496542 16.989482 20.832589 17.124626 20.787109 17.724609 C 20.722329 18.4353 20.546395 18.782904 20.455078 18.902344 C 20.423444 18.943719 20.420404 18.942902 20.414062 18.949219 L 19.619141 18.949219 L 19.496094 19.806641 C 19.396684 20.502096 19.182242 21.171693 18.951172 21.664062 C 18.720102 22.156433 18.367492 22.464633 18.503906 22.386719 L 18 22.675781 L 18 26.460938 A 1.0001 1.0001 0 1 0 20 26.460938 L 20 23.484375 C 20.256386 23.17877 20.568302 22.925809 20.761719 22.513672 C 21.030898 21.940097 21.218276 21.220422 21.361328 20.482422 C 21.592018 20.344009 21.865726 20.349014 22.042969 20.117188 C 22.447511 19.588061 22.691836 18.868443 22.779297 17.902344 L 22.779297 17.898438 L 22.779297 17.894531 C 22.845397 17.097816 22.618861 16.494233 22.269531 16.003906 C 22.616983 14.935936 23.011688 13.442054 23.007812 11.800781 C 23.005212 10.716467 22.942342 9.4704887 22.417969 8.3222656 C 21.945719 7.2881593 20.922924 6.4550241 19.546875 6.1171875 C 18.738528 4.9880494 17.337594 3.9394531 15.423828 3.9394531 L 15.412109 3.9394531 L 15.402344 3.9394531 z M 34.402344 3.9394531 C 31.613668 4.0021381 29.605902 4.872253 28.419922 6.3886719 C 27.233942 7.9050908 26.931083 9.8839414 27.015625 11.980469 C 27.060885 13.114663 27.291174 14.312359 27.572266 15.521484 C 27.216406 15.985707 26.938477 16.580133 27.011719 17.462891 L 27.013672 17.488281 L 27.017578 17.515625 C 27.148528 18.475733 27.41531 19.176255 27.804688 19.685547 C 27.968025 19.899188 28.228805 19.897331 28.433594 20.035156 C 28.569973 20.843924 28.788752 21.64924 29.109375 22.310547 C 29.29953 22.702755 29.504188 23.052314 29.71875 23.351562 C 29.79521 23.458196 29.919299 23.531697 29.998047 23.626953 L 29.998047 26.462891 A 1.0001 1.0001 0 1 0 31.998047 26.462891 L 31.998047 22.677734 L 31.496094 22.388672 C 31.618224 22.458652 31.472964 22.365772 31.34375 22.185547 C 31.214531 22.005326 31.055673 21.741667 30.908203 21.4375 C 30.613264 20.829167 30.360987 20.052655 30.300781 19.421875 L 30.214844 18.517578 L 29.439453 18.517578 C 29.427943 18.509017 29.427076 18.513267 29.394531 18.470703 C 29.29077 18.334988 29.107933 17.958674 29.007812 17.277344 C 28.985042 16.75611 29.322117 16.5103 29.173828 16.609375 L 29.761719 16.216797 L 29.587891 15.53125 C 29.261581 14.243337 29.058004 13.011458 29.013672 11.900391 C 28.939212 10.053918 29.238574 8.5896749 29.996094 7.6210938 C 30.751553 6.6551474 32.028064 5.9988504 34.431641 5.9414062 C 35.676871 5.9455862 36.803471 6.8717201 37.136719 7.4433594 L 37.380859 7.8632812 L 37.861328 7.9296875 C 38.917568 8.0779938 39.29248 8.4798167 39.599609 9.1523438 C 39.906739 9.8248706 40.005434 10.822955 40.007812 11.806641 C 40.011313 13.303818 39.547693 14.985925 39.230469 15.873047 L 38.931641 16.707031 L 39.724609 17.103516 C 39.496542 16.989482 39.832589 17.124626 39.787109 17.724609 C 39.722329 18.4353 39.546395 18.782904 39.455078 18.902344 C 39.423444 18.943719 39.420404 18.942902 39.414062 18.949219 L 38.619141 18.949219 L 38.496094 19.806641 C 38.396684 20.502096 38.182242 21.171693 37.951172 21.664062 C 37.720102 22.156433 37.367492 22.464633 37.503906 22.386719 L 37 22.675781 L 37 26.646484 L 37.066406 26.818359 C 37.555637 28.095202 38.687568 28.823353 39.875 29.376953 C 41.062432 29.930553 42.39932 30.347661 43.636719 30.853516 C 44.874118 31.35937 45.993414 31.950475 46.759766 32.734375 C 47.526114 33.518275 48 34.462243 48 36 A 1.0001 1.0001 0 1 0 50 36 C 50 34.007757 49.270914 32.442162 48.189453 31.335938 C 47.107993 30.229713 45.735382 29.550099 44.394531 29.001953 C 43.05368 28.453807 41.724584 28.032478 40.720703 27.564453 C 39.754236 27.113871 39.218263 26.652408 39 26.158203 L 39 23.484375 C 39.256386 23.17877 39.568302 22.925809 39.761719 22.513672 C 40.030898 21.940097 40.218276 21.220422 40.361328 20.482422 C 40.592018 20.344009 40.865726 20.349014 41.042969 20.117188 C 41.447511 19.588061 41.691836 18.868443 41.779297 17.902344 L 41.779297 17.898438 L 41.779297 17.894531 C 41.845397 17.097816 41.618861 16.494233 41.269531 16.003906 C 41.616983 14.935936 42.011688 13.442054 42.007812 11.800781 C 42.005212 10.716467 41.942342 9.4704887 41.417969 8.3222656 C 40.945719 7.2881593 39.922924 6.4550241 38.546875 6.1171875 C 37.738528 4.9880494 36.337594 3.9394531 34.423828 3.9394531 L 34.412109 3.9394531 L 34.402344 3.9394531 z M 15 32 L 18 46 L 21 46 L 24 32 L 21.955078 32 L 19.5 43.455078 L 17.044922 32 L 15 32 z M 30.4375 32 C 27.4055 32 26 33.837016 26 36.041016 C 26 37.286016 26.795719 38.4195 28.886719 39.5625 C 30.181719 40.3175 32 40.875 32 42 C 32 43.656 30.409 44 29 44 C 28.137 44 27.091516 43.77575 26.478516 43.46875 L 26 45.449219 C 26 45.449219 27.459 46 29 46 C 32.687 46 34 43.934 34 42 C 34 39.905 32.048812 38.931109 30.757812 38.287109 C 30.441813 38.130109 30.143578 37.980984 29.892578 37.833984 L 29.869141 37.820312 L 29.845703 37.806641 C 29.003703 37.346641 28 36.667016 28 36.041016 C 28 34.668016 28.7965 34 30.4375 34 C 30.9555 34 31.552125 34.280344 32.078125 34.527344 L 32.152344 34.560547 L 32.410156 34.681641 L 33 32.75 C 32.336 32.439 31.4365 32 30.4375 32 z" font-weight="400" font-family="sans-serif" white-space="normal" overflow="visible">
										            	</path>
										            </svg>
												</div>
												<div class="lit user-lit-btn" >

													@if($challenge->isLikedBy(Auth::id()))

														<i  class="fas fa-tint lit-btn-active"  data-postid="{{ $challenge->user_post_id }}" data-challengeid="{{ $challenge->id }}"></i>


													@else

														<i class="fas fa-tint lit-btn" data-postid="{{ $challenge->user_post_id }}" data-challengeid="{{ $challenge->id }}"></i>

													@endif

														<span id="lit-count" data-id="{{ $challenge->id }}">{{ $challenge->likers()->get()->count() }}</span>

												</div>

											</div>
											{{-- challenger post --}}
											<div class="col-md-5">
												<div class="post">
													<div class="header">
														<div class="card-avatar">
															@if ($challenge->challenger_avatar != null)
																<a href="explore/{{ $challenge->challenger }}">
																	<img id="avatar" src="/storage/{{ $challenge->challenger_avatar }}" alt="">
																</a>
															@else
																<a href="explore/{{ $challenge->challenger }}">
																	<img id="avatar" src="{{ URL::asset('img/avatar.jpg') }}" alt="">
																</a>
															@endif
														</div>
														<div class="username">{{ $challenge->challenger_name }}</div>
													</div>
													<div class="photo">
														<img id="photo" src="/storage/{{ $challenge->challenger_post }}" alt="">
													</div>
												</div>
											</div>
										</div>
									</div>
								@endforeach

							@else

								<h5 align="center" style="font-size: small; font-family: cursive;">
									<color style="color: blue;">F</color>
									<color style="color: green;">i</color>
									<color style="color: red;">n</color>
									<color style="color: black;">d</color>
									&nbsp;
									<color style="color: purple"> a</color>
									&nbsp;
									<color style="color: orange;"> c</color>
									<color style="color: indigo;">h</color>
									<color style="color: pink;">a</color>
									<color style="color: tomato;">l</color>
									<color style="color: blue;">l</color>
									<color style="color: red;">e</color>
									<color style="color: green;">n</color>
									<color style="color: violet;">g</color>
									<color style="color: orange;">e</color>
									!
								</h5>

							@endif

						</div>

					</div>
				</div>

				{{-- All notifications comes here --}}
				<div class="col-md-3">
					<div class="side-lit">
					</div>
				</div>

			</div>
		</div>
	</div>
	<script src="{{ URL::asset('js/nav.js') }}"></script>
	<script src="{{ URL::asset('js/filter.js') }}"></script>
	<script src="{{ URL::asset('js/challenge.js') }}"></script>
	<script src="{{ URL::asset('js/sidelit.js') }}"></script>
</body>
</html>
