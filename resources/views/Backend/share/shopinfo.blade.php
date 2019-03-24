@extends('backend.layouts.master')
@section('title','SHOPINFO')
@section('content')

<div class="container-fluid" id="shopinfo">
    <div class="row" id="shopinfo-title">
        <div class="col content-title">
            <i class="fas fa-store fa-3x align-middle"></i>
            <span class="align-middle">ShopInfo</span>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
     @endif
    @if ($errors->any())
        <div id="error_msg" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('backend.share.shopinfo.update')}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row" id="shopinfo-content">
            <div class="col-lg-7">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Shop Title:</h5>
                        <input type="text" name="title" class="form-control" value="{{$shopinfo->title}}"placeholder="title">
                    </div>
                </div>
                
                <div class="card mb-3">
                    <div class="card-header bg-warning">Shop Info:</div>
                    <div class="card-body">
                        <span>ADDRESS:</span>
                        <input type="text" name="address" class="form-control mb-3" value="{{$shopinfo->address}}" placeholder="address">
                        <span>TEL:</span>
                        <input type="text" name="tel" class="form-control mb-3" value="{{$shopinfo->tel}}" placeholder="tel">
                        <span>MAIL:</span>
                        <input type="text" name="mail" class="form-control mb-3" value="{{$shopinfo->mail}}" placeholder="mail">
                        <span>營業時間:</span>
                        <input type="text" name="businesshours" class="form-control mb-3" value="{{$shopinfo->businesshours}}" placeholder="business hours">
                        <span>OFF DAY:</span>
                        <input type="text" name="offday" class="form-control mb-3" value="{{$shopinfo->offday}}" placeholder="off day">
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mb-3">
                    <div class="card-header bg-primary text-white">
                        圖片上傳
                    </div>
                    <div class="card-body">
                        <input type="file" name="image" accept="image/*" class="form-control file-upload mb-3" id="image-create" >
                        <img class="preview border" src="{{ asset('uploads/shopinfo/' . $shopinfo->image) }}">
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header bg-success  text-white">
                        營業日日曆
                    </div>
                    <div class="card-body">
                        <div class="calendar_box">
                            <ul class="calendar_content">
                                <li class="label">一</li>
                                <li class="label">二</li>
                                <li class="label">三</li>
                                <li class="label">四</li>
                                <li class="label">五</li>
                                <li class="label">六</li>
                                <li class="label">日</li>
                            </ul>
                        </div>
                      
                    </div>
                </div>
               
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">更新</button>
            </div>   
        </div>
    </form>
    
</div>
 <script src="{{asset('jquery/jquery.min.js')}}"></script> 
 <script type="text/javascript">
    
    $(document).ready(function(){
        create_calendar();
    });
   

    
    var month_olympic = [31,29,31,30,31,30,31,31,30,31,30,31];
    var month_normal = [31,28,31,30,31,30,31,31,30,31,30,31];

    var create_calendar = function(){

        var calendar = {!! json_encode($calendars) !!};
        //get today date
        var date = new Date();
        var year = date.getFullYear();
        var month = date.getMonth();
        var day = date.getDate();


        var str = "";
        
        //calc totalday of month and first day of month
        var totalDay = daysMonth(month, year); 
        var firstDay = dayStart(month, year); 

        var myclass;
        var check;
        for(var i=1; i<firstDay; i++){ 
                str += "<li class='prev'></li>"; 
        }


        for(var i=1; i<=totalDay; i++){
            if(i < day ){ 
                myclass = " class='btn btn-secondary'"; 
            }else if (i == day){
                myclass = " class='btn btn-warning'"; 
            }else{
                myclass = " class='btn btn-primary'"; 
            }
            if(calendar[i-1].offday == 0)
                check="";
            else
                check="checked";
            str += "<li><label "+ myclass + "><input type='checkbox' name='day"+i+"' autocomplete='off'"+ check +"> "+i+"</label></li>";
        }

        $('.calendar_content').append(str);

    }
    function dayStart(month, year) {
        var tmpDate = new Date(year, month, 1);
        return (tmpDate.getDay());
    }
    function daysMonth(month, year) {
        var tmp = year % 4;
        if (tmp == 0) {
            return (month_olympic[month]);
        } else {
            return (month_normal[month]);
        }
    }
</script>   
@endsection