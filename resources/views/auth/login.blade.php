@extends('layouts.app')

@section('content')
    
    <div class="bg" style="">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card_head" style="text-align: center;">
                       <img src="{{ asset('images/icon.png') }}" style="width: 200px; height: 200px;">
                       <h1 style="margin-top: -10px; margin-bottom: 20px; color: #fff;">24/7 VIRTUAL AGENT PHILIPPINES INC.</h1> 
                       <div class="row justify-content-center">
                          <ul style="list-style: none;">
                              <li><h3 class="active">LOGIN</h3></li>
                              <li><h3 class="n_active"><a style="color: #fff; text-decoration: none;" href="/register">REGISTER</a></h3></li>
                          </ul>
                       </div>
                    </div>
                    <div class="car_body">
                        <div class="row justify-content-center">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group row">
                                   <!--  <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label> -->
                                   
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input style="width: 100%;" placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <!-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> -->
                                    
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input style="width: 100%;" placeholder="Password" style="border-color: #51545d;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label style="font-size: 14px;" class="form-check-label" for="remember">
                                              &nbsp; &nbsp; &nbsp;  {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6">
                                        @if (Route::has('password.request'))
                                            <a style="font-size: 14px; margin-top: 20px; color: #51545d;" class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                    <div  style="text-align: right; margin-top: 10px;" class="col-md-6">
                                        <button style="width: 100px; font-size: 16px; border-radius: 30px; background-color: #3c2221; border: none; padding-top: 8px; padding-bottom: 8px;" type="submit" class="btn btn-primary">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
