@extends('frontend.layouts.master')
@section('title','Home')
@section('content')
<!-- Main Content-->
<div class="col-md-10 col-lg-8 col-xl-7">
    <!-- Post preview-->
    @foreach($posts as $post)
    <div class="post-preview">
        <a href="post.html">
            <h2 class="post-title">{{$post->title}}</h2>
            <h3 class="post-subtitle">{{Str::limit($post->content,50)}}</h3>
        </a>
        <p class="post-meta"> Kategori :
            <a href="#!">{{$post->category->name}}</a>
            <br>
            <span class="float-right"> {{$post->created_at->diffForHumans()}}</span>
        </p>
    </div>

    @if(!$loop->last)
    <hr class="my-4" />
    @endif
    @endforeach

</div>

@include('frontend.widgets.categoryWidget')
@endsection
