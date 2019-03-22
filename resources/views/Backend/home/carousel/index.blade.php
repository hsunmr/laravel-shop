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
                            <form action="{{route('backend.home.carousel.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-12 mb-3">
                                        <strong>圖片名稱 :</strong>
                                        <input type="text" name="name" class="form-control" placeholder="Image Name">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <strong>上傳圖片 :</strong>
                                        <input type="file" name="image_name" accept="image/*" class="form-control file-upload" >
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
                                <td id="carousel-id">{{ $carousel->id }}</td>
                                <td>{{ $carousel->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/carousel/' . $carousel->image_name) }}">
                                </td>
                                <td>{{ $carousel->created_at }} </td>
                                <td>
                                    {{-- View button --}}
                                    <a href="{{ route('backend.home.carousel.show',$carousel->id ) }}" class="btn btn-warning"><i class="far fa-eye fa-fw"></i><span class="d-none d-lg-inline"> View</span></a>
                                    {{-- edit button --}}
                                    <a href="{{ route('backend.home.carousel.edit',$carousel->id ) }}" class="btn btn-primary"><i class="far fa-edit fa-fw"></i><span class="d-none d-lg-inline"> Edit</span></a>
                                    {{-- delete modal button --}}
                                    <button type="button" class="btn btn-danger align-top delete-button" data-toggle="modal" data-target="#deleteModal" data-id="{{ $carousel->id }}" data-url="{{ route('backend.home.carousel.destroy', $carousel->id ) }}" >
                                        <i class="far fa-trash-alt fa-fw"></i><span class="d-none d-lg-inline"> Delete</span>
                                    </button>
                                 </td>
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
                                                 <form action="{{ route('backend.home.carousel.destroy', $carousel->id ) }}" method="post"  class="d-inline delete-form">
                                                     @csrf  
                                                     @method('DELETE')
                                                     <button type="submit" class="btn btn-danger">Yes,delete</button>
                                                 </form>
                                                 
                                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>           
                                             </div>
                                         </div>
                                     </div>
                                 </div>
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