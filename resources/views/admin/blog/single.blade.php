@extends('layout.admin-master')

@section('content')
    <div class="container">
        <section id="post-admin">
            <a href="{{route('admin.blog.post.edit',$post->id)}}">Edit Post</a>
            <a href="{{route('admin.blog.post.delete',$post->id)}}">Delete Post</a>
        </section>

        <section class="post">
            <h1>{{$post->title}}</h1>
            <span class="inf">{{$post->author}}|{{$post->created_at}}</span>
            <p>{{$post->body}}</p>
        </section>
    </div>
@endsection