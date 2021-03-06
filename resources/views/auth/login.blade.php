@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">

          <div class="card-body">

            <div class="row">
              <div class="col text-center">
                <h2 class="section-title mb-3"><span>Sign In</span> With</h2>
              </div>
            </div>

            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="row mb-4">
                <div class="col text-center">
                  <ul class="list-inline m-0">
                    <li class="list-inline-item">
                      <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-google-plus"><i class="fab fa-google"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-facebook"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li class="list-inline-item">
                      <a href="http://scripteden.com/download/eden-ui/" target="_blank" class="btn-social btn-twitter"><i class="fab fa-twitter"></i></a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="row justify-content-center">
                <div class="col-md-8">
                  <div class="form-group">
                    <label for="exampleInputEmail1">{{ __('Email/Username') }}</label>
                    <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group">
                    <div class="d-flex flex-row justify-content-start">
                      <label for="password" class="mr-2">{{ __('Password') }}</label>
                      @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                          <small>{{ __('Forgot?') }}</small>
                        </a>
                      @endif
                    </div>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="form-group row mb-3">
                    <div class="col">
                      <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Login') }}
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>

            <div class="row mb-0">
              <div class="col text-center">
                <small class="text-muted">Not a member? <a href="{{ route('register') }}">Sign up now</a></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
