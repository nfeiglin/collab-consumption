@extends('layout.default')

    @section('pagetitle')
    Reset Password
    @stop

@section('content')
{{HTML::style('css/padding.css')}}
<h2 class = "container">Reset Password</h2>

@if (Session::has('error'))
  <div class ="alert alert-warning">
    <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
      {{ trans(Session::get('reason')) }}
    </div>

@endif
{{ Form::open(array('url' => 'password/reset/{token}','method' =>'POST', 'role' => 'form', 'class'=>'form-signin')) }}
      <input type="hidden" name="token" value="{{{ $token }}}">
      <input type="hidden" name="email" value="{{{ $email }}}">
          {{--
    <div class="form-group">
      {{ Form::email('email', null,  array('placeholder'=>'Enter your Email Adress', 'class' => 'form-control')) }}
    </div> --}}
    <div class="form-group">
      {{ Form::password('password', array('placeholder'=>'Chose a new password', 'class' => 'form-control')) }}
    </div>
       <div class="form-group">
      {{ Form::password('password_confirmation', array('placeholder'=>'Confirm password', 'class' => 'form-control')) }}
    </div>


     {{ Form::submit('Reset Password', array('class'=>'btn btn-large btn-block btn-success')) }}
                
       
{{ Form::close() }}
@stop