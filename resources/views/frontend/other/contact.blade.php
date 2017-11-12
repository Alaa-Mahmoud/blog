{{--Contact Page--}}

@extends('layout.master')

@section('title')
    Contact
@endsection

@section('style')
    <link rel="stylesheet" href="{{URL::to('src/css/form.css')}}" type="text/css">
@endsection

@section('content')
    @include('includes.info-box')

    <form action="" method="post" class="contact-form">
        {{csrf_field()}}
        <div class="input-group">
            <label for="name"> Your Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="input-group">
            <label for="email"> Your E-mail</label>
            <input type="text" name="email" id="email">
        </div>

        <div class="input-group">
            <label for="subject"> Subject</label>
            <input type="text" name="subject" id="subject">
        </div>

        <div class="input-group">
            <label for="message"> Your Message</label>
            <textarea name="message" id="message"  rows="10"></textarea>
        </div>
        <button type="submit" class="btn"> Submit Message</button>
    </form>

@endsection