@extends('layout.admin-master')

@section('style')
    <link rel="stylesheet" href="{{URL::to('src/css/model.css')}}" type="text/css">
@endsection

@section('content')
    <div class="container">
        @include('includes.info-box')
        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="{{route('admin.blog.create_post')}}" class="btn">New Post</a></li>
                        <li><a href="{{route('admin.blog.index')}}" class="btn">Show all posts</a></li>
                    </ul>
                </nav>
            </header>

            <section>
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

        </div>

        <div class="card">
            <header>
                <nav>
                    <ul>
                        <li><a href="" class="btn">Show all messages</a></li>
                    </ul>
                </nav>
            </header>

            <section>
                <ul>
                    {{--if no messages--}}
                    <li>No Messages</li>

                    {{--if messages--}}
                    <li>
                        <article data-message="body" data-id="ID">
                            <div class="message-info">
                                <h3>Message Subject</h3>
                                <span class="inf"> sender .... | Date</span>
                            </div>

                            <div class="edit">
                                <nav>
                                    <ul>
                                        <li><a href="">View</a></li>
                                        <li><a href="" class="danger">Delete</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </article>
                    </li>
                </ul>
            </section>

        </div>
    </div>


    <div class="model" id="contact-message-info">
        <button class="btn" id="model-close"> Close</button>
    </div>
@endsection


