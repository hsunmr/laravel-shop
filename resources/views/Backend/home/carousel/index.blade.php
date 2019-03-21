@extends('backend.layouts.master')
@section('title','Carousel')
@section('content')
<div class="container-fluid" id="carousel">
    <div class="row" id="carousel-title">
        <div class="col content-title">
            <i class="fas fa-images fa-4x align-middle"></i>
            <span class="align-middle">Carousel</span>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus-circle"></i> Add New
            </button>
            
            <!-- Modal -->
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
                            <form action="{{route('backend.home.carousel.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-12 mb-3">
                                        <strong>圖片名稱 :</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Image Name">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <strong>上傳圖片 :</strong>
                                        <input type="file" name="image_name" accept=".jpg,.png" class="form-control file-upload" >
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
    @if ($errors->any())
        <div id="error_msg" class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row" id="carousel-content">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="far fa-caret-square-right"></i> 輪播圖
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{'#'}}</th>
                                <th>Name</th>
                                <th>Post Image</th>
                                <th>created_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($carousels as $carousel)                            
                            <tr>
                                <td>{{ $carousel->id }}</td>
                                <td>{{ $carousel->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/carousel/' . $carousel->image_name) }}">
                                </td>
                                <td>{{ $carousel->created_at }} </td>
                                <td>
                                    <a href="{{ route('backend.home.carousel.show',$carousel->id ) }}" class="btn btn-warning"><i class="far fa-eye fa-fw"></i><span class="d-none d-lg-inline"> View</span></a>
                                    <a href="#" class="btn btn-primary"><i class="far fa-edit fa-fw"></i><span class="d-none d-lg-inline"> Edit</span></a>
                                    <form action="{{ asset('backend.home.carousel.destroy') }}" method="post" class="d-inline ">
                                        @csrf  
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger align-top"><i class="far fa-trash-alt fa-fw"></i><span class="d-none d-lg-inline"> Delete</span></a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row pagination" >
                        <div class="col-sm-10 text-left pagination-text">
                            Showing  {{ $carousels->firstItem() }} to {{ $carousels->lastItem() }} of {{ $carousels->total() }} items
                        </div>
                        <div class="col-sm-2 text-left">
                            {{ $carousels->links() }}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    
</div>
@endsection