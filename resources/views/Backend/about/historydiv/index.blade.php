@extends('backend.layouts.master')
@section('title','HISTORY-DIV')
@section('content')
<div class="container-fluid" id="historydiv">
    <div class="row" id="historydiv-title">
        <div class="col content-title">
            <i class="fas fa-history fa-3x align-middle"></i>
            <span class="align-middle">History Div</span>
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
                            <form action="{{route('backend.about.historydiv.store')}}" method="post">
                                @csrf
                                <div class="row ">
                                    <div class="col-md-12 mb-3">
                                        <strong>Post Title :</strong>
                                        <input type="text" name="title" class="form-control" placeholder="post title">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <strong>Post Text :</strong>
                                        <input type="text" name="text" class="form-control" placeholder="post text">
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
    <div class="row" id="aboutdiv-content">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <i class="far fa-clone"></i> 沿革區塊
                </div>
                <div class="card-body tableresponsive">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>{{'#'}}</th>
                                <th>Title</th>
                                <th>Text</th>
                                <th>created_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($historys as $history)   
                        <tr>
                            <td>{{ $history->id }}</td>
                            <td>{{ $history->title }}</td>
                            <td>{{ $history->text }}</td>
                            <td>{{ $history->created_at}}</td>
                            <td>
                                {{-- edit button --}}
                                <a href="{{ route('backend.about.historydiv.edit',$history->id ) }}" class="btn btn-primary"><i class="far fa-edit fa-fw"></i><span class="d-none d-lg-inline"> Edit</span></a>
                                {{-- delete modal button --}}
                                <button type="button" class="btn btn-danger align-top delete-button" data-toggle="modal" data-target="#deleteModal" data-id="{{ $history->id }}" data-url="{{ route('backend.about.historydiv.destroy', $history->id ) }}" >
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
                                                <form action="{{ route('backend.about.historydiv.destroy', $history->id ) }}" method="post"  class="d-inline delete-form">
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
                            Showing  {{ $historys->firstItem() }} to {{ $historys->lastItem() }} of {{ $historys->total() }} items
                        </div>
                        <div class="col-sm-2 text-left">
                            {{ $historys->links() }}
                        </div>
                    </div>      
                </div>
            </div>
            
        </div>
    </div>
    
</div>
    
@endsection