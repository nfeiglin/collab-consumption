@extends('layout.default')

    @section('pagetitle')
    {{{ $name }}}
  </div>
    @stop

@section('content')
<h2 class = "form-signin-heading container">{{{$name}}}</h1>



<div class = "container">
<h1>{{{ $name }}}! <small>{{{ $input_name }}}</small></h1>
<img class="img-circle" src="{{ $profile_image_url }}">
<h2>Bio</h2>
<p>{{{ $bio }}}</p>

</div>
                        
@stop

@section
    @include('partial.emailorsignup')
@stop