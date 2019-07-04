<!DOCTYPE html>
<html lang="zh-TW">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="dashboard login">
  <meta name="author" content="Hsun">

  <title>ADMIN</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('fontawesome/css/all.min.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+TC&display=swap" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('css/shop_backend.css')}}" rel="stylesheet"> 

</head>

<body>
    <div class="container-fluid" id="admin-login">
        <div class="container">
            <div class="pt-5" id="admin-login-logo">
                <img src="{{asset('img/icon/home_icon.png')}}">
                <h4>Hsun Coffee Backend</h4>
            </div>
            <div class="row justify-content-center" id="admin-login-form">
                <div class="col-lg-5 col-md-6">
                    <div class="card">  
                        <div class="card-header bg-secondary text-white">{{ __('管理員登入') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf

                                <div class="form-group ">
                                    <label for="username" class="col-md-12 col-form-label text-md-left">{{ __('username') }}</label>

                                    <div class="col-md-12">
                                        <input id="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                        @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="password" class="col-md-12  text-md-left">{{ __('password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                        
                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
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
                </div>
            </div>
        </div>
        
                
    </div>
    <script src="{{asset('jquery/jquery.min.js')}}"></script> 
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('fontawesome/js/all.min.js')}}"></script>
    <script src="{{asset('js/shop_backend.js')}}"></script>
</body>
</html>

