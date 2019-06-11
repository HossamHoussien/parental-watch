@extends('layouts.auth.main')

@section('content')


<div class="container-fluid">
    <div class="row no-gutter">
        <div class="col-sm-12">
            <div class="bg-white shade w-50 mx-auto login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Welcome back!</h3>
                            <form method="POST" action="{{ route('parent.login.post') }}">
                                @csrf
                                <div class="form-label-group">
                                    <input type="text" id="inputEmail" name="username" class="form-control"
                                        placeholder="Username" required autofocus>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="inputEmail">Username</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" id="inputPassword" name="password" class="form-control"
                                        placeholder="Password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div class="custom-control custom-checkbox mb-3">
                                    <input class="custom-control-input" id="customCheck1" type="checkbox"
                                        name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck1">Remember Me</label>
                                </div>
                                <button
                                    class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2"
                                    type="submit">Sign in</button>

                                <div class="custom-control text-center mb-3">
                                    <a href="{{ route('parent.register.get') }}">Don't have an account? Register now</a>
                                </div>

                                @if (Route::has('password.request'))

                                <div class="text-center">
                                    <a class="small"
                                        href="{{ route('parent.password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
