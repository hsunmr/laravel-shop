@extends('backend.layouts.master')
@section('title','PRODUCTS | PRODUCT')
@section('content')
<div class="container-fluid" id="product">
    <div class="row" id="menu-title">
        <div class="col content-title">
            <i class="fas fa-store fa-3x align-middle"></i>
            <span class="align-middle">Product</span>
            <a href="{{ route('backend.products.product.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add New</a>
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

    <div class="row table-content" id="product-content">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <i class="far fa-clone"></i> 商品
                </div>
                <div class="card-body tableresponsive">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>{{'#'}}</th>
                                <th>name</th>
                                <th>Product Image</th>
                                <th>description</th>
                                <th>Price</th>
                                <th>type</th>
                                <th>created_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)   
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td> 
                                <img src="{{ asset('uploads/product/' . $product->image) }}">
                            </td>
                            <td class="ellipsis">{{ $product->description }}</td>
                            <td >${{ $product->price }}</td>
                            <td >{{ $product->type }}</td>
                            <td>{{ $product->created_at}}</td>
                            <td>
                                {{-- View button --}}
                                <a href="{{ route('backend.products.product.show',$product->id ) }}" class="btn btn-warning"><i class="far fa-eye fa-fw"></i><span class="d-none d-lg-inline"> View</span></a>
                                {{-- edit button --}}
                                <a href="{{ route('backend.products.product.edit',$product->id ) }}" class="btn btn-primary"><i class="far fa-edit fa-fw"></i><span class="d-none d-lg-inline"> Edit</span></a>
                                {{-- delete modal button --}}
                                <button type="button" class="btn btn-danger align-top delete-button" data-toggle="modal" data-target="#deleteModal" data-id="{{ $product->id }}" data-url="{{ route('backend.products.product.destroy', $product->id ) }}" >
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
                                                <form action="{{ route('backend.products.product.destroy', $product->id ) }}" method="post"  class="d-inline delete-form">
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
                            Showing  {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} items
                        </div>
                        <div class="col-sm-2 text-left">
                            {{ $products->links() }}
                        </div>
                    </div>      
                </div>
            </div>
            
        </div>
    </div>
    
</div>
    
@endsection