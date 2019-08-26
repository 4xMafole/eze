<div class="chal-notify">

	@foreach($following_challenge as $following_challenge)
		@for($initilizer = 0; $initilizer < count($following_challenge); $initilizer++)

			<div class="status">
				<div class="row">
					<div class="col-md-3">
						<div class="avatar">

							@if($following_challenge[$initilizer]->avatar != null)

								<picture>
									<source type="image/webp" srcset="/storage/webp/{{ $following_challenge[$initilizer]->avatar->avatar }}">
									<img id="side-avatar" src="/storage/{{ $following_challenge[$initilizer]->avatar->avatar }}" alt="{{ $following_challenge[$initilizer]->username }}">
								</picture>

							@else

								<img id="side-avatar" src="{{ URL::asset('img/avatar.png') }}" alt="{{ $following_challenge[$initilizer]->username }}">

							@endif

						</div>
					</div>
					<div class="col-md-9">
						<div class="side-status" style="margin-top: 20px;">
							<b>{{ $following_challenge[$initilizer]->username }}</b>
						</div>
					</div>
				</div>
				<hr>
			</div>

		@endfor
	@endforeach

</div>
<br>
<div class="lit-notify">

	@foreach($user_lit as $user_lit)
		@for($initilizer = 0; $initilizer < count($user_lit); $initilizer++)
			<div class="status">
				<div class="row">
					<div class="col-md-3">
						<div class="avatar">
							@if($user_lit[$initilizer]->avatar != null)
								
								<picture>
									<source type="image/webp" srcset="/storage/webp/{{ $user_lit[$initilizer]->avatar->avatar }}">
									<img id="side-avatar" src="/storage/{{ $user_lit[$initilizer]->avatar->avatar }}" alt="{{ $user_lit[$initilizer]->username }}">
								</picture>

							@else

								<img id="side-avatar" src="{{ URL::asset('img/avatar.png') }}" alt="{{ $user_lit[$initilizer]->username }}">

							@endif
						</div>
					</div>
					<div class="col-md-9">
						<div class="side-status">
							<b>
								@if ($user_lit[$initilizer]->id != Auth::id())
									{{ $user_lit[$initilizer]->username }}
								@else
								You
								@endif
							</b> lit your challenge
						</div>
					</div>
				</div>
				<hr>
			</div>
		@endfor
	@endforeach

</div>
