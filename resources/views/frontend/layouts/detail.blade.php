<div class="container-fluid" id="detail">
    <div class="container-fluid" id="detail-cotent">
        <h2 class="head_title">SHOP INFO</h2>
        <div class="img_wrap">
            <img src="{{asset('uploads/shopinfo/' . $shopinfo->image)}}" alt="shop img" >
        </div>
        <div class="container-fluid">
            <div class="row block_wrap">
                <div class="col-lg-6">
                    <div class="block_left">
                        <div class="font-weight-bold shop_name">{{$shopinfo->title}}</div>
                        <br>
                        <div class="address">
                            <span class="font-weight-bold box_head">地址</span>
                            <br class="break">
                            <span>{{$shopinfo->address}}</span>
                        </div>
                        <br>
                        <div class="tel_box">
                            <span class="font-weight-bold box_head">TEL</span>
                            <br class="break">
                            <span class="tel">{{$shopinfo->tel}}</span>
                        </div>
                        <div class="mail_box">
                            <span class="font-weight-bold box_head">MAIL</span>
                            <br class="break">
                            <a href="{{'mailto:' . $shopinfo->mail}}" class="mail">{{$shopinfo->mail}}</a>
                        </div>
                        <br>
                        <div class="open_info_box">
                            <span class="font-weight-bold box_head">營業時間</span>
                            <span class="open_time">{{$shopinfo->businesshours}}</span>
                        </div>
                        <div class="rest_info_box">
                            <span class="font-weight-bold box_head">定休日</span>
                            <span class="rest_time">{{$shopinfo->offday}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 ">
                    <div class="block_right">
                        <div class="calendar_head font-weight-bold text-center">
                            <span class="calendar_month"></span>月営業日日曆
                            <br>
                            <br>
                        </div>
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
                            <div class="calendar_notice"><span class="calendar_sample"></span>定休日</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                myclass = "lightgrey"; 
            }else if (i == day){
                myclass = "today"; 
            }else{
                myclass = ""; 
            }
            if(calendar[i-1].offday == 0)
               myclass +=" store_close";

            str += "<li class='" + myclass + "'>" + i + "</li>";
       }
       $('.calendar_month').text(month+1);
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