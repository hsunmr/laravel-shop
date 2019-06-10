@extends('frontend.layouts.master') 
@section('title','RESET PASSWORD')
@section('content')
<div class="container-fluid profile_page_des">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h2 class="page_title">Reset Password</h2>
            @if (session()->has('success'))
            <div class="container">
                <div class="alert alert-success pt-3 pb-3 mb-5">
                    {{ session()->get('success') }}
                </div>
            </div>
            @endif
            <div class="container profile_content mb-5">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('重設密碼') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('resetpassword.update') }}">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="password" class=" col-md-3 col-form-label text-md-left">{{ __('新密碼 ') }}<font style="color:red">*</font></label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-3 col-form-label text-md-left">{{ __('確認新密碼 ') }}<font style="color:red">*</font></label>

                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-secondary w-50" id="register_button">
                                        {{ __('確認') }}
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