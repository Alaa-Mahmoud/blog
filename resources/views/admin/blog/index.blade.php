@extends('layout.admin-master')

@section('style')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}" type="text/css">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <section id="post-admin">
            <a href="{{route('admin.blog.create_post')}}" class="btn">New Post</a>
        </section>
        <section class="list">
            <ul>
                @if(count($posts) == 0)
                    {{--if no posts--}}
                    <li>No Posts</li>
                @else
                    @foreach($posts as $post)
                        <li>
                            <article>
                                <div class="post-info">
                                    <h3>{{$post->title}}</h3>
                                    <span class="inf"> {{$post->author}}| {{$post->created_at}}</span>
                                </div>

                                <div class="edit">
                                    <nav>
                                        <ul>
                                            <li><a href="{{route('admin.blog.post',$post->id )}}">View Post</a></li>
                                            <li><a href="{{route('admin.blog.post.edit',$post->id)}}">Edit Post</a></li>
                                            <li><a href="{{route('admin.blog.post.delete',$post->id)}}" class="danger">Delete</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </article>
                        </li>
                    @endforeach
                @endif
            </ul>
        </section>
        @if($posts->lastPage() > 1)
            @if($posts->currentPage != 1)
                <a href="{{$posts->previousPageUrl()}}"><span class="fa fa-caret-left"></span></a>
            @endif

            @if($posts->currentPage() != $posts->lastPage())
                    <a href="{{$posts->nextPageUrl()}}"> <span class="fa fa-caret-right"></span></a>
            @endif

        @endif
    </div>
@endsection