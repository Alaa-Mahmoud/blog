@section('style')
    <link rel="stylesheet" href="{{URL::to('src/css/common.css')}}" type="text/css">
@append

@if(Session::has('fail'))
  <section class="info-box fail">
     {{Session::get('fail')}}
  </section>
@endif

@if(Session::has('success'))
   <section class="info-box success">
       {{Session::get('success')}}
   </section>
@endif

@if(count($errors)>0)
    <section class="info-box fail">
        <ul>
            @foreach($errors->all() as $error)
               {{$error}}
            @endforeach
        </ul>
    </section>
@endif