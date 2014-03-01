@extends('layout.home-default')

    @section('pagetitle')
   Work spaces, meeting rooms, office spaces
    @stop



@include('partial.header')

@section('fullwidth')
<style>
    body {
        padding-top: 0;
        background-color: #ecf0f1 !important;
    }
</style>
<div class="jumbotron feature lighter">
    <div class="container">
        <h1 class="blood-orange">What is Open Source Collaborative Consumption Marketplace</h1>
        <p class="h3 lighter-blue">Open Source Collaborative Consumption Marketplace is an innovative platform for entrepreneurs to find and book coworking and work spaces. Save time, money and meet people faster.</p>
        <div class="col-lg-4 col-md-4 col-sm-7 col-xs-12"><a href="#signup" class="btn btn-success btn-lg btn-block">Sign up</a></div>
    </div>
</div>

<div class="jumbotron feature darker">
    <div class="container">
        <h1 class="lighter-blue">For Entrepreneurs</h1>
        <p class="h3 white">Open Source Collaborative Consumption Marketplace is an innovative platform for entrepreneurs to find and book coworking spaces and other places to work. Save time, money and meet people faster.</p>
    </div>
</div>

<div class="jumbotron feature lighter">
    <div class="container">
        <h1 class="blood-orange">For Space Owners</h1>
        <p class="h3 lighter-blue">Open Source Collaborative Consumption Marketplace is an innovative platform for entrepreneurs to find and book coworking spaces and work spaces. Save time, money and meet people faster.</p>
        <div class="col-lg-4 col-md-4 col-sm-7 col-xs-12"><a href="#signup" class="btn btn-success btn-lg btn-block">Sign up</a></div>
    </div>
</div>

<div class="jumbotron feature darker">
    <div class="container">
        <h1 class="lighter-blue text-center">Meet the team</h1>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pull-left offset-3 col-md-offset-3  text-center">

            <img src="/images/avi.jpg" class="img-circle img-responsive" alt="Amazing founder!!">
            <p class="h3 white">John Smith</p>

            <p class="lead white">Founder</p>
            <p class="white">An amazing bio goes here!</p>
            <a href="https://twitter.com/nfeiglin" class="twitter-follow-button" data-show-count="false" data-dnt="true">Follow @nfeiglin</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 text-center">
            <img src="/images/avi.jpg" class="img-circle img-responsive" alt="Such amaze. Many person.">
            <p class="h3 white">Person 2</p>

            <p class="lead white">Co-founder</p>
            <p class="white">Award winning bio goes here!</p>
        </div>
    </div>
</div>

    @include('partial.emailorsignup')

@stop
