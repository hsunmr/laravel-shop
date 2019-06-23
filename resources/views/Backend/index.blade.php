@extends('backend.layouts.master')
@section('title','HSUN COFFEE | dashboard')
@section('content')
<div class="container-fluid" id="dashboard">
   <div class="row title" id="dashboard-title">
      <div class="col content-title">
            <i class="fas fa-tachometer-alt fa-3x align-middle"></i>
            <span class="align-middle">Dashboard</span>
      </div>
   </div>
   <div class="row dashboard_info">
      <div class="col-xl-3 col-md-6 mb-4">
         <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row dashboard-item no-gutters align-items-center">
               <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                  <div class="h5 mb-0">$40,000</div>
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
                  <div class="h5 mb-0">$215,000</div>
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
                     <div class="h5 mb-0 mr-3">使用者人數 {{  Auth::user()->count()  }}</div>
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
   <div class="row">
      <div class="col-md-4">
         <div class="card" id="dashboard-user">
            <div class="card-header">
               <i class="fas fa-user-friends"></i> User
            </div>
            <div class="card-body" id="user-content">
               <i class="fas fa-user-circle fa-5x dashboard-icon"></i>
               <p class="card-text">目前使用者人數 <span class="align-middle" id="user-num">{{  Auth::user()->count()  }}</span></p>
               <p class="card-text">資料庫中有{{  Auth::user()->count()  }}個使用者資料，你可以點擊下方取得更多使用者の資訊</p>
               <a href="{{route('backend.user.users.index')}}" class="btn btn-primary dashboard-btn">View All Users</a>
            </div>
         </div>
      </div>
      <div class="col-md-4 dashboard-col">
            <div class="card" id="dashboard-user">
               <div class="card-header">
                  <i class="fas fa-user-friends"></i> User
               </div>
               <div class="card-body" id="user-content">
                  <i class="fas fa-users fa-5x dashboard-icon"></i>
                  <p class="card-text">目前使用者人數 <span class="align-middle" id="user-num">{{  Auth::user()->count()  }}</span></p>
                  <p class="card-text">資料庫中有{{  Auth::user()->count()  }}個使用者資料，你可以點擊下方取得更多資訊</p>
               </div>
            </div>
         </div>
         <div class="col-md-4 dashboard-col">
               <div class="card" id="dashboard-user">
                  <div class="card-header">
                     <i class="fas fa-user-friends"></i> User
                  </div>
                  <div class="card-body" id="user-content">
                     <i class="fas fa-users fa-5x dashboard-icon"></i>
                     <p class="card-text">目前使用者人數 <span class="align-middle" id="user-num">{{  Auth::user()->count()  }}</span></p>
                     <p class="card-text">資料庫中有{{  Auth::user()->count()  }}個使用者資料，你可以點擊下方取得更多資訊</p>
                  </div>
               </div>
            </div>
   </div>

</div>

    
@endsection
