@extends('layout.admin-master')

@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::secure('src/css/categories')}}">
@endsection

@section('content')
    @include('includes.info-box')
    <div class="container">
        <section id="category-admin">
            <form method="post" action="{{route('admin.blog.category.update' ,$category->id)}}">
                {{csrf_field()}}
                <div class="input-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" value="{{Request::old('name')}}">
                    <button type="submit" class="btn">update Category</button>
                </div>
            </form>
        </section>

@endsection