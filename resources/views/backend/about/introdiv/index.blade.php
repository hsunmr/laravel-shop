@extends('backend.layouts.master')
@section('title','INTRO-DIV')
@section('content')
<div class="container-fluid" id="intordiv">
    <div class="row title" id="about-title">
        <div class="col content-title">
            <i class="fas fa-book-open fa-3x align-middle"></i>
            <span class="align-middle">Intro Div</span>
            <a href="{{ route('backend.about.introdiv.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Add New</a>
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

    <div class="row table-content" id="aboutdiv-content">
        <div class="col">
            <div class="card">
                <div class="card-header">
                        <i class="far fa-clone"></i> 介紹區塊
                </div>
                <div class="card-body tableresponsive">
                    <table class="table table-hover" >
                        <thead>
                            <tr>
                                <th>{{'#'}}</th>
                                <th>Title</th>
                                <th>Post Image</th>
                                <th>Post Text</th>
                                <th>created_at</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($introdivs as $introdiv)   
                        <tr>
                            <td>{{ $introdiv->id }}</td>
                            <td>{{ $introdiv->title }}</td>
                            <td> 
                                <img src="{{ asset('uploads/introdiv/' . $introdiv->image) }}">
                            </td>
                            <td class="ellipsis">{{ $introdiv->text }}</td>
                            <td>{{ $introdiv->created_at}}</td>
                            <td>
                                {{-- View button --}}
                                <a href="{{ route('backend.about.introdiv.show',$introdiv->id ) }}" class="btn btn-warning"><i class="far fa-eye fa-fw"></i><span class="d-none d-lg-inline"> View</span></a>
                                {{-- edit button --}}
                                <a href="{{ route('backend.about.introdiv.edit',$introdiv->id ) }}" class="btn btn-primary"><i class="far fa-edit fa-fw"></i><span class="d-none d-lg-inline"> Edit</span></a>
                                {{-- delete modal button --}}
                                <button type="button" class="btn btn-danger align-top delete-button" data-toggle="modal" data-target="#deleteModal" data-id="{{ $introdiv->id }}" data-url="{{ route('backend.about.introdiv.destroy', $introdiv->id ) }}" >
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
                                                <form action="{{ route('backend.about.introdiv.destroy', $introdiv->id ) }}" method="post"  class="d-inline delete-form">
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
                            Showing  {{ $introdivs->firstItem() }} to {{ $introdivs->lastItem() }} of {{ $introdivs->total() }} items
                        </div>
                        <div class="col-sm-2 text-left">
                            {{ $introdivs->links() }}
                        </div>
                    </div>      
                </div>
            </div>
            
        </div>
    </div>
    
</div>
    
@endsection