@extends('layout.default')

    @section('pagetitle')
    Sign Up
    @stop



@section('content')
<h1 class ="text-primary">Sign Up to Open Source Collaborative Consumption Marketplace</h1>
{{HTML::style('css/padding.css')}}

<div class = "container">
    @if($errors->has())
      <div class ="alert alert-warning">
        <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
          Sorry, we're having errors with your input.
        <ul>
          @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
          @endforeach
        </ul>
      </div>
    @endif




<div class = "col-md-8 col-lg-8 col-sm-12 col-xs-12 pull-left">
{{-- Name --}}
<form class="form-signin" action="signup" method="post">
    {{ Form::token() }}
  <div class="form-group">

      <input type="text" class="form-control" id="name" name="name" placeholder="Your full name" value="{{Input::Old('name')}}" required autofocus>
  </div>
{{-- /Name --}}


{{-- Email --}}
  <div class="form-group">
      <input type="email" class="form-control" id="email" name="email" value="{{Input::Old('email')}}" placeholder="Your email" required>

  </div>
{{-- /Email --}}

{{-- Password --}}
    <div class="form-group">
      <input type="password" class="form-control" id="password" placeholder="Create a password (min 8 characters)" name="password" pattern="^.{6,}$" required>
    </div>
{{-- /Password --}}

{{-- Submit Button --}}
    <div class="form-group">
     <input type="submit" class="btn btn-success btn-block btn-lg" value="Sign Up">
    </div>
{{-- /Submit --}}
</form>

</div> {{-- Close Column --}}
<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 pull-right">
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>
</div>
</div> {{-- Close Containter --}}




                        
@stop