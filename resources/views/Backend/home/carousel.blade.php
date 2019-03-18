@extends('backend.layouts.master')
@section('title','HSUN COFFEE | carousel')
@section('content')
<div class="container-fluid" id="carousel">
    <div class="row" id="carousel-title">
        <div class="col content-title">
            <i class="fas fa-images fa-4x align-middle"></i>
            <span class="align-middle">Carousel</span>
            <a href="#" class="btn btn-success "><i class="fas fa-plus-circle"></i> Add New</a>
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
                                <th>No.</th>
                                <th>Name</th>
                                <th>Post Image</th>
                                <th>created_at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>First</td>
                                <td>img</td>
                                <td>2019-3-19</td>
                                <td>create</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
            
        </div>
    </div>
    
</div>
@endsection