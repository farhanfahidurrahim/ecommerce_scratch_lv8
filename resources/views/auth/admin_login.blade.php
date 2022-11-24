@extends('layouts.admin')
@section('admin_content')

<div class="hold-transition login-page">
	<div class="login-box">
	  <!-- /.login-logo -->
	  <div class="card card-outline card-primary">
	    <div class="card-header text-center">
	      <a href="{{URL('/')}}" class="h1"><b>Admin</b> Panel</a>
	    </div>
	    <div class="card-body">
	      <p class="login-box-msg">Sign in to start admin session</p>

	      <form action="{{ route('login') }}" method="post">
	      	@csrf
	        <div class="input-group mb-3">
	          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email" required>
	          <div class="input-group-append">
	            <div class="input-group-text">
	              <span class="fas fa-envelope"></span>
	            </div>
	          </div>
	        </div>
	        @if(session()->has('error'))
                <strong style="color:red;"> {{ session()->get('error') }} </strong>
            @endif
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

	        <div class="input-group mb-3">
	          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="Password" required>
	          <div class="input-group-append">
	            <div class="input-group-text">
	              <span class="fas fa-lock"></span>
	            </div>
	          </div>
	        </div>
	        @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

	        <div class="row">
	          <div class="col-8">
	            <div class="icheck-primary">
	              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
	              <label for="remember">
	                Remember Me
	              </label>
	            </div>
	          </div>
	          <!-- /.col -->
	          <div class="col-4">
	            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
	          </div>
	          <!-- /.col -->
	        </div>
	      </form>

	      <p class="mb-1">
	        <a href="#">I forgot my password</a>
	      </p>
	      {{-- <p class="mb-0">
	        <a href="register.html" class="text-center">Register a new membership</a>
	      </p> --}}
	    </div>
	    <!-- /.card-body -->
	  </div>
	  <!-- /.card -->
	</div>
</div>

@endsection