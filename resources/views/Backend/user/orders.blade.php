@extends('backend.layouts.master')
@section('title','ORDERS')
@section('content')
<div class="container-fluid" id="orders">
    <div class="row title" id="orders-title">
        <div class="col content-title">
            <i class="fas fa-file-invoice-dollar fa-3x align-middle"></i>
            <span class="align-middle">Orders</span>
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

    <div class="row table-content" id="orders-content">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <i class="far fa-clone"></i> 訂單資訊
                </div>
                <div class="card-body tableresponsive">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>{{'#'}}</th>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Zip_cd</th>
                                <th>Address</th>
                                <th>Tel</th>
                                <th>Email</th>
                                <th>TotalPrice</th>
                                <th>Status</th>
                                <th>created_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)   
                        <tr>
                            <td>{{ $order->id }} {{ $order->status }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->order_name }}</td>
                            <td>{{ $order->zip_cd }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->tel }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->totalPrice }}</td>
                            <td><font style="color:red">
                                @switch($order->status)
                                    @case(0)
                                        處理中
                                        @break
                                    @case(1)
                                        運送中
                                        @break
                                    @case(2)
                                        已完成
                                        @break
                                    @default
                                        錯誤
                                @endswitch
                                </font>
                            </td>
                            <td>{{ $order->created_at}}</td>
                            <td>
                                {{-- View button --}}
                                <a href="{{ route('backend.user.orders.show',$order->id ) }}" class="btn btn-warning"><i class="far fa-eye fa-fw"></i><span class="d-none d-lg-inline"> View</span></a>
                                {{-- edit button --}}
                                <button type="button" class="btn btn-primary align-top edit-button" data-toggle="modal" data-target="#editModal" data-status="{{ $order->status }}" data-id="{{ $order->id }}" data-url="{{ route('backend.user.orders.update', $order->id ) }}" >
                                    <i class="far fa-edit fa-fw"></i><span class="d-none d-lg-inline"> Edit Status</span>
                                </button>
                                {{-- edit Modal --}}
                                <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Status</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">                  
                                                <form action="{{route('backend.user.orders.update',$order->id)}}" method="post" class="edit-form">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <strong>訂單狀態 :</strong>
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="0">處理中</option>
                                                                <option value="1">運送中</option>
                                                                <option value="2">已完成</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">更新</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>           
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                        </tr>
                        @endforeach
                        </tbody>
                    </table>        
                    <div class="row pagination" >
                        <div class="col-sm-10 text-left pagination-text">
                            Showing  {{ $orders->firstItem() }} to {{ $orders->lastItem() }} of {{ $orders->total() }} items
                        </div>
                        <div class="col-sm-2 text-left">
                            {{ $orders->links() }}
                        </div>
                    </div>      
                </div>
            </div>
            
        </div>
    </div>
    
</div>
    
@endsection