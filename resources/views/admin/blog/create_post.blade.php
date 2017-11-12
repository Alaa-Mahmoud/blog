@extends('layout.admin-master')

@section('style')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}" type="text/css">
@endsection

@section('content')
  <div class="container">
      @include('includes.info-box')

      <form action="{{route('admin.blog.post.create')}}" method="post" >
          {{csrf_field()}}
          <div class="input-group">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" {{$errors->has('title')? 'class= has-error':''}} required>
          </div>
          <div class="input-group">
              <label for="author">Author</label>
              <input type="text" name="author" id="author" {{$errors->has('author')? 'class= has-error':''}}  required >
          </div>

          <div class="input-group">
              <label for="category_select">Category</label>
              <select name="category_select" id="category_select">
                  @foreach($categories as $category)
                  <option value="{{$category->name}}">{{$category->name}}</option>
                      @endforeach
              </select>
              <input type="hidden" name="categories" id="categories">
          </div>

          <div class="input-group">
              <label for="body">Body</label>
              <textarea name="body" id="body"  rows="15" {{$errors->has('body')? 'class= has-error':''}}  required></textarea>
          </div>
            <button type="submit" class="btn">Create Post</button>
      </form>
  </div>


@endsection


