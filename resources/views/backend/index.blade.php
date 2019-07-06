@extends('backend.layouts.master')
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
   $(document).ready(function () {
      var earnings_canvas = $('#Earnings_chart');
      var rated_canvas = $('#Rated_chart');
      var line_data = {!! json_encode($line_data) !!};
      var Pie_data = {!! json_encode($Pie_data) !!};
      var earnings_config ={
         // The type of chart we want to create
         type: 'line',

         // The data for our dataset
         data: {
            labels: line_data.labels,
            datasets: [{
                  label: 'Earnings',
                  backgroundColor: 'rgb(255, 99, 132)',
                  borderColor: 'rgb(255, 99, 132)',
                  data: line_data.data,
                  fill: false,
            }],
            
         },

         // Configuration options go here
         options: {
            responsive: true,
            maintainAspectRatio: false,
            tooltips: {
               mode: 'index',
               intersect: false,
            },
            hover: {
               mode: 'nearest',
               intersect: true
            },
         }
      };
      var rated_config ={
         // The type of chart we want to create
         type: 'doughnut',

         // The data for our dataset
         data: {
            labels: Pie_data.labels,
            datasets: [{
                  label: 'Earnings',
                  backgroundColor: [
                     'rgb(255, 99, 132)',
                     'rgb(255, 159, 64)',
                     'rgb(255, 205, 86)',
                     'rgb(75, 192, 192)',
                     'rgb(54, 162, 235)',
                     'rgb(154, 162, 235)',
                  ],

                  data: Pie_data.data,
            }],
            
         },

         // Configuration options go here
         options: {
            legend: {
               display: true,
               position: 'right',
            },
            cutoutPercentage: 80,
            responsive: true,
            maintainAspectRatio: false,
         }
      };
      var chart = new Chart(earnings_canvas,earnings_config);
      var chart2 = new Chart(rated_canvas,rated_config);
   });
</script>
@endpush
@section('title','HSUN COFFEE | dashboard')
@section('content')

<div class="container-fluid" id="dashboard">
   <div class="row title" id="dashboard-title">
      <div class="col content-title">
            <i class="fas fa-tachometer-alt fa-3x align-middle"></i>
            <span class="align-middle">Dashboard</span>
      </div>
   </div>
   <div class="row" id="dashboard_info">
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row dashboard-item no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                  <div class="h5 mb-0">${{$EarningsofMonth}}</div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-calendar fa-2x"></i>
               </div>
            </div>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
            <div class="row dashboard-item no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                  <div class="h5 mb-0">${{$EarningsofAnnual}}</div>
               </div>
               <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x"></i>
               </div>
            </div>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
            <div class="row dashboard-item no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Users</div>
                  <div class="row no-gutters align-items-center">
                  <div class="col-auto">
                     <div class="h5 mb-0 mr-3">使用者人數 {{ $usersCount }}</div>
                  </div>
                  </div>
               </div>
               <div class="col-auto">
                  <a href="{{route('backend.user.users.index')}}"><i class="fas fa-user-circle fa-2x"></i></a>
               </div>
            </div>
            </div>
         </div>
      </div>

      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
            <div class="row dashboard-item no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Orders</div>
                  <div class="h5 mb-0">訂單總數 {{$ordersCount}}</div>
               </div>
               <div class="col-auto">
                     <a href="{{route('backend.user.orders.index')}}"><i class="fas fa-file-invoice-dollar fa-2x"></i></a>
               </div>
            </div>
            </div>
         </div>
      </div>
   </div>
   <div class="row" id="dashboard_earnings_linechart">
      <div class="col-xl-7 mb-4">
         <div class="card">
            <div class="card-header">
               <span class="text-primary">Earnings OverView</span>
            </div>
            <div class="card-body">
               <div class="chart-area">
                  <canvas id="Earnings_chart"></canvas>
               </div>
               
            </div>
         </div>
      </div>
      <div class="col-xl-5">
            <div class="card">
               <div class="card-header">
                  <span class="text-success">Top Rated Products (MONTHLY)</span>  
               </div>
               <div class="card-body">
                  <div class="chart-area">
                     <canvas id="Rated_chart"></canvas>
                  </div>
               </div>
            </div>
         </div> 
   </div>

</div>

    
@endsection
