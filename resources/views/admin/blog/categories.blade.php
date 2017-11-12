@extends('layout.admin-master')

@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::secure('src/css/categories')}}">
@endsection

@section('content')
     @include('includes.info-box')
    <div class="container">
        <section id="category-admin">
             <form method="post" action="{{route('admin.blog.category.create')}}">
                 {{csrf_field()}}
                 <div class="input-group">
                     <label for="name">Category Name</label>
                     <input type="text" name="name" id="name">
                     <button type="submit" class="btn">Create Category</button>
                 </div>
             </form>
        </section>

        <section class="list">
              @foreach($categories as $category)
             <article>
                 <div class="category-info">
                     <h3>{{$category->name}}</h3>
                 </div>
             </article>
                  <div class="edit">
                       <nav>
                           <ul>
                               <li class="category-edit"><input type="text" name="name"></li>
                               <li><a href="{{route('admin.blog.category.edit',$category->id)}}">Edit</a></li>
                               <li><a href="{{route('admin.blog.category.delete',$category->id)}}" class="danger">Delete</a></li>
                           </ul>
                       </nav>
                  </div>
            @endforeach
        </section>
        {{--@if($categories->lastPage() > 1)--}}
            {{--@if($categories->currentPage != 1)--}}
                {{--<a href="{{$categories->previousPageUrl()}}"><span class="fa fa-caret-left"></span></a>--}}
            {{--@endif--}}

            {{--@if($categories->currentPage() != $categories->lastPage())--}}
                {{--<a href="{{$categories->nextPageUrl()}}"> <span class="fa fa-caret-right"></span></a>--}}
            {{--@endif--}}

        {{--@endif--}}

    </div>
@endsection