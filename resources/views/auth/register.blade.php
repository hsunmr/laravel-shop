@extends('frontend.layouts.master') 
@section('title','REGISTER')
@section('content')
<div class="container">
    <div class="row justify-content-center" >
        
        <div class="col-lg-8">
            <h2 class="page_title">REGISTER</h2>
            <div class="card">
                <div class="card-header bg-secondary text-white">{{ __('會員註冊') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
                            <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('電子郵件信箱 ') }}<font style="color:red">*</font></label>

                            <div class="col-md-9">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('姓名 ') }}<font style="color:red">*</font></label>

                            <div class="col-md-4">                       
                                <input id="name_last" type="text" class="form-control{{ $errors->has('name_last') ? ' is-invalid' : '' }}" name="name_last" value="{{ old('name_last') }}" maxlength="5" required>

                                @if ($errors->has('name_last'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_last') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <input id="name_first" type="text" class="form-control{{ $errors->has('name_first') ? ' is-invalid' : '' }}" name="name_first" value="{{ old('name_first') }}" maxlength="15" required>

                                @if ($errors->has('name_first'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_first') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-3 col-form-label text-md-left">{{ __('性別') }}</label>
                            <div class="col-md-3" id="gender">
                                <select name="gender" id="gender" class="selectbox form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                    <option value="" selected="selected">請選擇</option>
                                    <option value="01">男性</option>
                                    <option value="02">女性</option>
                                </select>
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-3 col-form-label text-md-left">{{ __('出生日期') }}</label>
                            <div class="col-md-4">
                                <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday">
                            </div>
                            @if ($errors->has('birthday'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('birthday') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group row">
                            <label for="zip_cd" class="col-md-3 col-form-label text-md-left">{{ __('郵遞區號 ') }}<font style="color:red">*</font></label>

                            <div class="col-md-3">
                                <input id="zip_cd" type="text" class="form-control{{ $errors->has('zip_cd') ? ' is-invalid' : '' }}" name="zip_cd" value="{{ old('zip_cd') }}" maxlength="5" required>

                                @if ($errors->has('zip_cd'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip_cd') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-3 col-form-label text-md-left">{{ __('縣/市/鄉/鎮') }}</label>

                            <div class="col-md-9">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" >
                            </div>
                            @if ($errors->has('city'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>   

                        <div class="form-group row">
                            <label for="addr1" class="col-md-3 col-form-label text-md-left">{{ __('路名') }}</label>

                            <div class="col-md-9">
                                <input id="addr1" type="text" class="form-control{{ $errors->has('addr1') ? ' is-invalid' : '' }}" name="addr1" value="{{ old('addr1') }}">
                            </div>
                            @if ($errors->has('addr1'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('addr1') }}</strong>
                                </span>
                            @endif
                        </div>    
                        <div class="form-group row">
                            <label for="addr2" class="col-md-3 col-form-label text-md-left">{{ __('巷/弄/號/樓') }}</label>

                            <div class="col-md-9">
                                <input id="addr2" type="text" class="form-control{{ $errors->has('addr2') ? ' is-invalid' : '' }}" name="addr2" value="{{ old('addr2') }}">
                            </div>
                            @if ($errors->has('addr2'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('addr2') }}</strong>
                                </span>
                            @endif
                        </div> 
                        
                        <div class="form-group row">
                            <label for="tel" class="col-md-3 col-form-label text-md-left">{{ __('手機/電話號碼 ') }}<font style="color:red">*</font></label>

                            <div class="col-md-6">
                                <input id="tel" type="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{ old('tel') }}" maxlength="12" required>

                                @if ($errors->has('tel'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group row">
                            <label for="password" class=" col-md-3 col-form-label text-md-left">{{ __('密碼 ') }}<font style="color:red">*</font></label>

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
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-left">{{ __('確認密碼 ') }}<font style="color:red">*</font></label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-secondary w-50" id="register_button">
                                    {{ __('送出') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
