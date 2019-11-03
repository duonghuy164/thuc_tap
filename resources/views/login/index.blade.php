@extends('login.layout.master')

@section('content')
<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{route('handle.login')}}">
					@csrf
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Email name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					@if(session('fail'))
						<div class="alert alert-success">
							<p>{{session('fail')}}</p>
						</div>
					@endif
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Login
						</button>
						<a href="{{route('forget.pass')}}">Quên mật khẩu</a>
					</div>

				</form>

@endsection