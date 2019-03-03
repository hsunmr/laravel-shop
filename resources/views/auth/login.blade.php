@extends('frontend.layouts.master') 
@section('title','LOGIN')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-8">
            <h2 class="page_title">LOGIN</h2>
            <div class="card">  
                <div class="card-header bg-secondary text-white">{{ __('會員登入') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group ">
                            <label for="email" class="col-md-12 col-form-label text-md-left">{{ __('電子郵件地址') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password" class="col-md-12  text-md-left">{{ __('密碼') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-12 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group  mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-secondary w-100">
                                    {{ __('登入') }}
                                </button>
                            </div>   
                                                    
                        </div>                      
                    </form>

                </div>
            </div>
            <div class="login-info">
                @if (Route::has('password.request'))
                    <div class="col-md-12 text-center">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            <i class="fas fa-angle-double-right"></i>{{ __('忘記密碼') }}
                        </a>
                    </div>
                @endif
                <div class="col-md-12 text-center">
                    <a class="btn btn-link" href="{{ route('register') }}">
                        <i class="fas fa-angle-double-right"></i>{{ __('會員註冊') }}
                    </a>
                </div>   
            </div>
           
        </div>
    </div>
</div>
@endsection
