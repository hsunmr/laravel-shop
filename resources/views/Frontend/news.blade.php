@extends('frontend.layouts.master') 
@section('title','NEWS')
@section('content')
<div class="container" id="news_page_content">
    <div class="news_page_des">
        <h2 class="page_title">NEWS</h2>
        <div class="news_page_text">
            <ul>
                @foreach ($newss as $news)
                <li>
                    <time>{{$news->created_at->format('Y年m月d日')}}</time>
                    <br>
                    <a href="{{route('news.detail',$news->id)}}"><span>{{$news->title}}</span></a>
                </li>
                @endforeach			
            </ul>

        </div>
        <div class="row pagination" >
            <div class="col-sm-10 text-left pagination-text">
                Showing  {{ $newss->firstItem() }} to {{ $newss->lastItem() }} of {{ $newss->total() }} items
            </div>
            <div class="col-sm-2 text-left" style="color:black">
                {{ $newss->links() }}
            </div>
        </div>      
    </div>
</div>   
@endsection