@extends('layouts.app')

@section('content')
    
    <div class="bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card_head" style="text-align: center;">
                       <img src="{{ asset('images/icon.png') }}" style="width: 200px; height: 200px;">
                       <h1 style="margin-top: -10px; margin-bottom: 20px; color: #fff;">24/7 VIRTUAL AGENT PHILIPPINES INC.</h1> 
                       <div class="row justify-content-center">
                          <ul style="list-style: none;">
                              <li><h3 class="n_active"><a style="color: #fff; text-decoration: none;" href="/login">LOGIN</a></h3></li>
                              <li><h3 class="active"><a style="color: #3c2221; text-decoration: none;" href="/register">REGISTER</a></h3></li>
                          </ul>
                       </div>
                       <div class="car_body">
                           <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-6 col-form-label text-md-left">{{ __('Name') }}</label>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-6 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-6 col-form-label text-md-left">{{ __('Password') }}</label>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-6 col-form-label text-md-left">{{ __('Confirm Password') }}</label>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div style="text-align: right; margin-top: 10px;" class="col-md-12">
                                        <button style="width: 100px; font-size: 16px; border-radius: 30px; background-color: #3c2221; border: none; padding-top: 8px; padding-bottom: 8px;" type="submit" class="btn btn-primary">
                                            {{ __('Register') }}
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
