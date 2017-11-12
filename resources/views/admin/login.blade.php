@extends('layout.admin-master')

@section('style')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{URL::to('src/css/form')}}">
@endsection

@section('content')
  <div class="container">
       @include('includes.info-box')
      <form action="{{route('admin.login')}}" method="post">
          {{csrf_field()}}
           <div class="input-group">
               <label for="name">E-mail</label><br>
               <input type="email" name="email" required/><br>
               <label for="name">Password</label><br>
               <input type="password" name="password" required/><br>
               <button type="submit" class="btn">Login</button>
           </div>
      </form>
  </div>
@endsection