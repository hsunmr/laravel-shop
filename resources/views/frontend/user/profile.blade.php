@extends('frontend.layouts.master') 
@section('title','PROFILE')
@section('content')
<div class="container-fluid profile_page_des">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="page_title">Profile</h2>
            @if (session()->has('success'))
            <div class="container">
                <div class="alert alert-success pt-3 pb-3 mb-5">
                    {{ session()->get('success') }}
                </div>
            </div>
            @endif
            <div class="container profile_content mb-5">
                <div class="card">
                    <div class="card-header bg-secondary text-white">{{ __('個人資料') }}</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('profile.update') }}">
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
                                <label for="email" class="col-md-3 col-form-label text-md-left">{{ __('電子郵件信箱 ') }}</label>

                                <div class="col-md-9">
                                    <p>{{Auth::user()->email}}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-3 col-form-label text-md-left">{{ __('姓名 ') }}</label>

                                <div class="col-md-9">                       
                                    <p>{{Auth::user()->name_last}}{{Auth::user()->name_first}}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="gender" class="col-md-3 col-form-label text-md-left">{{ __('性別') }}</label>
                                <div class="col-md-3" id="gender">
                                    <select name="gender" id="gender" class="selectbox form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}">
                                        @switch(Auth::user()->gender)
                                            @case('01')
                                                <option value="">請選擇</option>
                                                <option value="01" selected>男性</option>
                                                <option value="02">女性</option>
                                                @break
                                            @case('02')
                                                <option value="">請選擇</option>
                                                <option value="01">男性</option>
                                                <option value="02" selected>女性</option>
                                                @break
                                            @default
                                                <option value="" selected>請選擇</option>
                                                <option value="01">男性</option>
                                                <option value="02">女性</option>
                                        @endswitch
                                        
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
                                    <input id="birthday" type="date" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{Auth::user()->birthday}}">
                                </div>
                                @if ($errors->has('birthday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group row">
                                <label for="zip_cd" class="col-md-3 col-form-label text-md-left">{{ __('郵遞區號 ') }}</label>

                                <div class="col-md-3">
                                    <input id="zip_cd" type="text" class="form-control{{ $errors->has('zip_cd') ? ' is-invalid' : '' }}" name="zip_cd" value="{{Auth::user()->ZIP_CD}}" maxlength="5" required>

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
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{Auth::user()->CITY}}" >
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
                                    <input id="addr1" type="text" class="form-control{{ $errors->has('addr1') ? ' is-invalid' : '' }}" name="addr1" value="{{Auth::user()->ADDR1}}">
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
                                    <input id="addr2" type="text" class="form-control{{ $errors->has('addr2') ? ' is-invalid' : '' }}" name="addr2" value="{{Auth::user()->ADDR2}}">
                                </div>
                                @if ($errors->has('addr2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('addr2') }}</strong>
                                    </span>
                                @endif
                            </div> 
                            
                            <div class="form-group row">
                                <label for="tel" class="col-md-3 col-form-label text-md-left">{{ __('手機/電話號碼 ') }}</label>

                                <div class="col-md-6">
                                    <input id="tel" type="tel" class="form-control{{ $errors->has('tel') ? ' is-invalid' : '' }}" name="tel" value="{{Auth::user()->TEL}}" maxlength="12" required>

                                    @if ($errors->has('tel'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('tel') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>   

                            <div class="form-group row mb-0">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-secondary w-50" id="register_button">
                                        {{ __('更新資料') }}
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