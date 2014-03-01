@extends('layout.default')

    @section('pagetitle')
    Login
    @stop

@section('content')
{{HTML::style('css/padding.css')}}
<h2 class = "form-signin-heading container">Login</h1>


{{ Form::open(array('route' => 'sessions.store', 'class'=>'form-signin')) }}
        
                        <div class="form-group">
                        {{ Form::email('email', Input::old('email'),  array('placeholder'=>'Email', 'class' => 'form-control', 'required' => 'required', 'autofocus')) }}
                        </div>
                        <div class="form-group">
                        {{ Form::password('password', array('placeholder'=>'Password', 'class' => 'form-control', 'required')) }}
                        </div>
                        {{Form::token()}}
                        {{ Form::submit('Login', array('class'=>'btn btn-large btn-block btn-success')) }}
                
       
{{ Form::close() }}
    <p><a href="{{action('PasswordController@view')}}">Forgot password?</a></p>
@stop