@extends('backend.layouts.master')
@section('title','SHOP')
@section('content')
<div class="container-fluid" id="shop">
    <div class="row" id="shop-title">
        <div class="col content-title">
            <i class="fas fa-store fa-3x align-middle"></i>
            <span class="align-middle">Shop</span>
            <a href="{{ route('backend.shop.shop-detail.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add New</a>
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

    <div class="row table-content" id="shop-content">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="far fa-clone"></i> 店鋪資訊
                </div>
                <div class="card-body tableresponsive">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>{{'#'}}</th>
                                <th>name</th>
                                <th>address</th>
                                <th>address_en</th>
                                <th>tel</th>
                                <th>open time</th>
                                <th>url</th>
                                <th>created_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($shops as $shop)   
                        <tr>
                            <td>{{ $shop->id }}</td>
                            <td>{{ $shop->name }}</td>
                            <td class="w-150">{{ $shop->address }}</td>
                            <td class="ellipsis">{{ $shop->address_en }}</td>
                            <td>{{ $shop->tel }}</td>
                            <td>{{ $shop->open_time }}</td>
                            <td>
                                <iframe src="{{ $shop->url }}" width="150" height="100" frameborder="0" style="border:0" allowfullscreen></iframe>    
                            </td>
                            <td>{{ $shop->created_at}}</td>
                            <td>
                                {{-- View button --}}
                                <a href="{{ route('backend.shop.shop-detail.show',$shop->id ) }}" class="btn btn-warning"><i class="far fa-eye fa-fw"></i><span class="d-none d-lg-inline"> View</span></a>
                                {{-- edit button --}}
                                <a href="{{ route('backend.shop.shop-detail.edit',$shop->id ) }}" class="btn btn-primary"><i class="far fa-edit fa-fw"></i><span class="d-none d-lg-inline"> Edit</span></a>
                                {{-- delete modal button --}}
                                <button type="button" class="btn btn-danger align-top delete-button" data-toggle="modal" data-target="#deleteModal" data-id="{{ $shop->id }}" data-url="{{ route('backend.shop.shop-detail.destroy', $shop->id ) }}" >
                                    <i class="far fa-trash-alt fa-fw"></i><span class="d-none d-lg-inline"> Delete</span>
                                </button>
                                <!-- delete Modal -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Delete</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">                  
                                                <p>Are you sure you want to delete it?</p>       
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('backend.shop.shop-detail.destroy', $shop->id ) }}" method="post"  class="d-inline delete-form">
                                                    @csrf  
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Yes,delete</button>
                                                </form>
                                                
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>           
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
                            Showing  {{ $shops->firstItem() }} to {{ $shops->lastItem() }} of {{ $shops->total() }} items
                        </div>
                        <div class="col-sm-2 text-left">
                            {{ $shops->links() }}
                        </div>
                    </div>      
                </div>
            </div>
            
        </div>
    </div>
    
</div>
    
@endsection