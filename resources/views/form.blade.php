{{-- registration --}}
<div class="register">
	<form method="post" action="{{ route('register') }}">
		<input type="text" name="username" placeholder="username" value="{{ Request::old('username') ?: '' }}" autocomplete="off">
		<input type="email" name="email" placeholder="your_email@gmail.com"  autocomplete="off">
		<input type="password" name="password"  placeholder="Password" autocomplete="off">
		{{-- password does not confirm password it can be surpassed --}}
		<input type="password" name="password_confirmation" placeholder="confirm password" autocomplete="off">
		<div id="register-bn">
			<button>Register</button>
		</div>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>

{{-- login --}}
<div class="login">
	<form method="post" action="{{ route('login') }}">
		<input type="email" name="email"  placeholder="your_email@gmail.com" value="{{ Request::old('email') ?: '' }}" autocomplete="off">
		<input type="password" name="password"  placeholder="Password" autocomplete="off">
	    <input name="remember" type="checkbox" />
		<div id="login-bn">
			<button>Log in</button>
		</div>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>

{{-- forgot_password --}}
<div class="forgot_password">
	<form method="get" action="{{ route('email.reset') }}">
		<span id="forgotten">forgot password?</span>
		<br>
		<br>
		<div id="login-bn">
			<button>Yes</button>
		</div>
		<input type="hidden" name="_token" value="{{ Session::token() }}">
	</form>
</div>
