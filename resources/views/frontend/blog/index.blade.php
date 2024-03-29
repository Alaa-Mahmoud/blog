 {{--Page which Display All Blog Posts--}}

@extends('layout.master')

@section('title')
    Index Page
@endsection

 @section('style')
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
 @endsection

@section('content')
    @include('includes.info-box')
    @foreach($posts as $post)
    <div class="blog-post">
        <article>
            <h3>{{$post->title}}</h3>
            <span class="subtitle">{{$post->author}} | {{$post->created_at}}</span>
            <p>{{$post->body}}</p>
            <a href="{{route('blog.single',$post->id)}}">Read More</a>
        </article>

    </div>
    @endforeach
      @if($posts->lastPage() > 1)
          <section class="pagination">
            @if($posts->currentPage() !== 1)
                  <a href="{{$posts->previousPageUrl()}}"><i class="fa fa-caret-left"></i></a>
            @endif

              @if($posts->currentPage() !== $posts->lastPage())
                    <a href="{{$posts->nextPageUrl()}}" class="fa fa-caret-right"></a>
              @endif
              
          </section>
      @endif
@endsection