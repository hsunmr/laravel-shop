@extends('backend.layouts.master')
@section('title','PRODUCTS | PRODUCT-TYPE')
@section('content')
<div class="container-fluid" id="product_type">
    <div class="row" id="product_type-title">
        <div class="col content-title">
            <i class="fas fa-align-justify fa-3x align-middle"></i>
            <span class="align-middle">Product Type</span>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus-circle"></i> Add New
            </button>
            
            <!-- create new Modal -->
            <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Add New</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">                  
                            <form action="{{route('backend.products.product-type.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <strong>種類名稱 :</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Type Name">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <strong>種類 :</strong>
                                        <input type="text" name="type" class="form-control" placeholder="Type">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <strong>類別順序 :</strong>
                                        <select class="form-control" name="order" >
                                        @for ($i = 1; $i <= $types->count()+1; $i++)
                                            <option>{{$i}}</option>
                                        @endfor
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">上傳</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>           
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
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

    <div class="row table-content" id="product_type-content">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <i class="far fa-clone"></i> 種類
                </div>
                <div class="card-body tableresponsive">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>{{'#'}}</th>
                                <th>Type Name</th>
                                <th>Type</th>
                                <th>Order</th>
                                <th>created_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($types as $type)   
                        <tr>
                            <td>{{ $type->id }}</td>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->type }}</td>
                            <td>{{ $type->order }}</td>
                            <td>{{ $type->created_at}}</td>
                            <td>
                                {{-- edit button --}}
                                <a href="{{ route('backend.products.product-type.edit',$type->id ) }}" class="btn btn-primary"><i class="far fa-edit fa-fw"></i><span class="d-none d-lg-inline"> Edit</span></a>
                                {{-- delete modal button --}}
                                <button type="button" class="btn btn-danger align-top delete-button" data-toggle="modal" data-target="#deleteModal" data-id="{{ $type->id }}" data-url="{{ route('backend.products.product-type.destroy', $type->id ) }}" >
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
                                                <form action="{{ route('backend.products.product-type.destroy', $type->id ) }}" method="post"  class="d-inline delete-form">
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
                            Showing  {{ $types->firstItem() }} to {{ $types->lastItem() }} of {{ $types->total() }} items
                        </div>
                        <div class="col-sm-2 text-left">
                            {{ $types->links() }}
                        </div>
                    </div>      
                </div>
            </div>
            
        </div>
    </div>
    
</div>
    
@endsection