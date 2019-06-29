@extends('backend.layouts.master')
@section('title','USERS')
@section('content')
<div class="container-fluid" id="users">
    <div class="row title" id="users-title">
        <div class="col content-title">
            <i class="fas fa-users-cog fa-3x align-middle"></i>
            <span class="align-middle">Users</span>
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

    <div class="row table-content" id="users-content">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <i class="far fa-clone"></i> 使用者資料
                </div>
                <div class="card-body tableresponsive">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>{{'#'}}</th>
                                <th>Email</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Birthday</th>
                                <th>Zip_cd</th>
                                <th>City</th>
                                <th>ADDR1</th>
                                <th>ADDR2</th>
                                <th>TEL</th>
                                <th>Role</th>
                                <th>created_at</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)   
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name_last }}{{ $user->name_first }}</td>
                            <td>
                                @switch($user->gender )
                                    @case('01')
                                        男性
                                        @break
                                    @case('02')
                                        女性
                                        @break
                                    @default
                                        
                                @endswitch
                            </td>
                            <td>{{ $user->birthday }}</td>
                            <td>{{ $user->ZIP_CD }}</td>
                            <td>{{ $user->CITY }}</td>
                            <td>{{ $user->ADDR1 }}</td>
                            <td>{{ $user->ADDR2 }}</td>
                            <td>{{ $user->TEL }}</td>
                            <td>
                                @if ($user->type=='1')
                                    管理員
                                @else
                                    一般會員
                                @endif
                            </td>
                            <td>{{ $user->created_at}}</td>
                            
                        </tr>
                        @endforeach
                        </tbody>
                    </table>        
                    <div class="row pagination" >
                        <div class="col-sm-10 text-left pagination-text">
                            Showing  {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} items
                        </div>
                        <div class="col-sm-2 text-left">
                            {{ $users->links() }}
                        </div>
                    </div>      
                </div>
            </div>
            
        </div>
    </div>
    
</div>
    
@endsection