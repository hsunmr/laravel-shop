@extends('backend.layouts.master')
@section('title','Carousel')
@section('content')
<div class="container-fluid" id="carousel">
    <div class="row" id="carousel-title">
        <div class="col content-title">
            <i class="fas fa-images fa-4x align-middle"></i>
            <span class="align-middle">Carousel</span>
            <a href="{{route('backend.home.carousel.create')}}" class="btn btn-success "><i class="fas fa-plus-circle"></i> Add New</a>
        </div>
    </div>
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
                                    
                                    <a href="{{ asset('uploads/carousel/' . $carousel->image_name) }}" class="btn btn-warning"><i class="far fa-eye fa-fw"></i><span class="d-none d-lg-inline"> View</span></a>
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