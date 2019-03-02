@extends('frontend.layouts.master') 
@section('title','REGISTER')
@section('content')
<div class="container">
    <div class="row justify-content-center" >
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('會員註冊') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
        
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-left">{{ __('電子郵件信箱') }}</label>

                            <div class="col-md-10">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group1 row">
                            <label for="name" class="col-md-2 col-form-label text-md-left">{{ __('姓名') }}</label>

                            <div class="col-md-5">                       
                                <input id="name_last" type="text" class="form-control{{ $errors->has('name_last') ? ' is-invalid' : '' }}" name="name_last" value="{{ old('name_last') }}" required autofocus>

                                @if ($errors->has('name_last'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_last') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <input id="name_first" type="text" class="form-control{{ $errors->has('name_first') ? ' is-invalid' : '' }}" name="name_first" value="{{ old('name_first') }}" required autofocus>

                                @if ($errors->has('name_first'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_first') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="gender" class="col-md-2 col-form-label text-md-left">{{ __('性別') }}</label>
                            <div class="col-md-3" id="gender">
                                <select name="gender" id="gender" class="selectbox form-control">
                                    <option value="" selected="selected">請選擇</option>
                                    <option value="01">男性</option>
                                    <option value="02">女性</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group1 row">
                            <label for="birthday" class="col-md-2 col-form-label text-md-left">{{ __('出生日期') }}</label>

                            <div class="col-md-3">
                                <select name="birthday_year" id="BIRTH_DT_YEAR" class="selectbox form-control"><option value="" selected="selected">年</option><option value="2019">2019</option><option value="2018">2018</option><option value="2017">2017</option><option value="2016">2016</option><option value="2015">2015</option><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option><option value="1969">1969</option><option value="1968">1968</option><option value="1967">1967</option><option value="1966">1966</option><option value="1965">1965</option><option value="1964">1964</option><option value="1963">1963</option><option value="1962">1962</option><option value="1961">1961</option><option value="1960">1960</option><option value="1959">1959</option><option value="1958">1958</option><option value="1957">1957</option><option value="1956">1956</option><option value="1955">1955</option><option value="1954">1954</option><option value="1953">1953</option><option value="1952">1952</option><option value="1951">1951</option><option value="1950">1950</option><option value="1949">1949</option><option value="1948">1948</option><option value="1947">1947</option><option value="1946">1946</option><option value="1945">1945</option><option value="1944">1944</option><option value="1943">1943</option><option value="1942">1942</option><option value="1941">1941</option><option value="1940">1940</option><option value="1939">1939</option><option value="1938">1938</option><option value="1937">1937</option><option value="1936">1936</option><option value="1935">1935</option><option value="1934">1934</option><option value="1933">1933</option><option value="1932">1932</option><option value="1931">1931</option><option value="1930">1930</option><option value="1929">1929</option><option value="1928">1928</option><option value="1927">1927</option><option value="1926">1926</option><option value="1925">1925</option><option value="1924">1924</option><option value="1923">1923</option><option value="1922">1922</option><option value="1921">1921</option><option value="1920">1920</option></select>
                            </div>
                            <div class="col-md-2">   
                                <select name="birthday_month" id="BIRTH_DT_MONTH" class="selectbox form-control"><option value="">月</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="col-md-2"> 
                                <select name="birthday_day" id="BIRTH_DT_DATE" class="selectbox form-control"><option value="">日</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ZIP_CD" class="col-md-2 col-form-label text-md-left">{{ __('郵遞區號') }}</label>

                            <div class="col-md-3">
                                <input id="ZIP_CD" type="text" class="form-control{{ $errors->has('ZIP_CD') ? ' is-invalid' : '' }}" name="ZIP_CD" value="{{ old('ZIP_CD') }}" required autofocus>

                                @if ($errors->has('ZIP_CD'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ZIP_CD') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group1 row">
                            <label for="CITY" class="col-md-2 col-form-label text-md-left">{{ __('縣/市/鄉/鎮') }}</label>

                            <div class="col-md-10">
                                <input id="CITY" type="text" class="form-control{{ $errors->has('CITY') ? ' is-invalid' : '' }}" name="CITY" value="{{ old('CITY') }}" required autofocus>

                                @if ($errors->has('CITY'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CITY') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   

                        <div class="form-group row">
                            <label for="ADDR1" class="col-md-2 col-form-label text-md-left">{{ __('路名') }}</label>

                            <div class="col-md-10">
                                <input id="ADDR1" type="text" class="form-control{{ $errors->has('ADDR1') ? ' is-invalid' : '' }}" name="ADDR1" value="{{ old('ADDR1') }}" required autofocus>

                                @if ($errors->has('ADDR1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ADDR1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>    
                        <div class="form-group1 row">
                            <label for="ADDR2" class="col-md-2 col-form-label text-md-left">{{ __('巷/弄/號/樓') }}</label>

                            <div class="col-md-10">
                                <input id="ADDR2" type="text" class="form-control{{ $errors->has('ADDR2') ? ' is-invalid' : '' }}" name="ADDR2" value="{{ old('ADDR2') }}" required autofocus>

                                @if ($errors->has('ADDR2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ADDR2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                        
                        <div class="form-group row">
                            <label for="TEL" class="col-md-2 col-form-label text-md-left">{{ __('手機/電話號碼') }}</label>

                            <div class="col-md-6">
                                <input id="TEL" type="text" class="form-control{{ $errors->has('TEL') ? ' is-invalid' : '' }}" name="TEL" value="{{ old('TEL') }}" required autofocus>

                                @if ($errors->has('TEL'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('TEL') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>   
                        <div class="form-group1 row">
                            <label for="password" class="col-md-2 col-form-label text-md-left">{{ __('密碼') }}</label>

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
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-left">{{ __('確認密碼') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-5">
                                <button type="submit" class="btn btn-secondary">
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
