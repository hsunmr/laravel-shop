@extends('backend.layouts.master')
@section('title','HSUN COFFEE | dashboard')
@section('content')
<div class="container-fluid" id="dashboard">
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
               <a href="#" class="btn btn-primary dashboard-btn">View All Users</a>
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
