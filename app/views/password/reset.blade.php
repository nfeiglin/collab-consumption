@extends('layout.default')
@section('pagetitle')
Password Reset
@stop

@section('content')
{{HTML::style('css/padding.css')}}
<h2 class = "container">Reset Password</h2>

@if(Session::has('success') | Session::has('error'))
	<div class ="alert alert-success">
		<a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
    	If your Open Source Collaborative Consumption Marketplace account has that email address, we've sent an email to it with reset instructions.
    </div>
@endif
    {{ Form::open(array('action' => 'PasswordController@send', 'role' => 'form', 'class'=>'form-signin')) }}
        
	    <div class="form-group">
     	    {{ Form::email('email', NULL,  array('placeholder'=>'Email', 'class' => 'form-control', 'autofocus' => 'autofocus', 'required' => 'required')) }}
        <p class="help-block">Enter the email address you created your account with</p>
        </div>
        {{Form::token()}}
     {{ Form::submit('Send Reset Email', array('class'=>'btn btn-large btn-block btn-success')) }}
                
       
{{ Form::close() }}
@stop