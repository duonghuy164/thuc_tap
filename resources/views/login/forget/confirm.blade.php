	@extends('login.layout.master')

@section('content')
<span class="login100-form-title p-b-41">
					Forget Pass
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{route('handle.confirm.mail')}}">
					@csrf
					<input type="hidden" value="{{$id}}" name="id">
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="code" placeholder="Code">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="text" name="pass" placeholder="Pass name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					@if(session('fail'))
						<div class="alert alert-success">
							<p>{{session('fail')}}</p>
						</div>
					@endif
					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
							Xac Nhan
						</button>
					</div>

				</form>

@endsection