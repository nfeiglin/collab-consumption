<!DOCTYPE html>

<html>
<head>
    <title>Open Source Collaborative Consumption Marketplace | @yield('pagetitle')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    {{HTML::style('//fonts.googleapis.com/css?family=Open+Sans+Condensed:700|Open+Sans:400italic,700italic,400,700')}}
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    {{HTML::style('css/styles.css')}}
    <!-- Script tags -->
    {{ HTML::Script('js/js.js') }}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/holder/2.0/holder.min.js" type="text/javascript"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation" id="head">
    <div class="container">
        <a class="navbar-brand" href="{{ URL::to('/') }}"><img id="brand-logo"class="img-responsive" src="{{ URL::to('images/logo.png') }}"></a>
        <button class="navbar-toggle" data-target=".navHeaderCollapse" data-toggle="collapse">
        <span class="icon-bar"></span> <span class="icon-bar"></span>
        <span class="icon-bar"></span></button>
        @if (Auth::guest())
        <a class="navbar-btn btn btn-link pull-right" href="{{ URL::action('SessionsController@create') }}" alt="Login">Login</a>
        <a class="navbar-btn btn-success btn btn-lg btn-block pull-right" href="{{ URL::action('ProfileController@signup')}}" style="width: 25%" alt="Sign up">Sign up</a>
        @endif
        <form class="form-inline pull-left" style="margin-top:10px;" action="{{ action('SearchController@show') }}" method="get">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Where do you want to work or meet?" name="location">
            </div>
        </form>

        <div class="collapse navbar-collapse navHeaderCollapse">

            <ul class="nav navbar-nav navbar-right pull-right">

                @if (Auth::check())
                <li>
                    <a href="{{ URL::action('DashboardController@view') }}" alt="User Profile">Hey there, {{Auth::user()->name}}!</a>
                </li>
                <li>
                    <a href="{{ URL::action('SessionsController@destroy') }}" alt="logout">Log out</a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="row">
    <div class="container panel panel-body">
        @if(Session::get('flash_message_good'))
        <div class ="alert alert-success">
            {{Session::get('flash_message_good')}}
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
        </div>
        @endif
        @if(Session::get('flash_message'))
        <div class ="alert alert-warning">
            {{ Session::get('flash_message') }}
            <button class="close" data-dismiss="alert" aria-hidden="true"><a href="#">&times;</a></button>
        </div>
        @endif
        @if(Session::get('flash_message_404'))
        <div class ="alert alert-warning">
            {{ Session::get('flash_message_404') }}
            <button class="close" data-dismiss="alert" aria-hidden="true"><a href="#">&times;</a></button>
        </div>
        @endif
        @yield('content')
    </div>
</div>

<div class="row" id="full-width">
    @yield('fullwidth')
</div>

</body>
</html>