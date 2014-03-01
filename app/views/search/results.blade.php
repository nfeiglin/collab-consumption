@extends('layout.default')

@section('pagetitle')
{{{$title}}}
@stop

@section('content')
{{HTML::style('css/padding.css')}}

<div class ="container page-header">
    <div class="row">
        <div class="col-md-8">
            <h1 class="text-primary">{{{$title}}}</h1>
        </div>
     </div>
    <div class="row">
        @include('partial.horizontal-search')
    </div>
</div>

<div class="container">

    <div class="row">
        @if(count($listings) == 0)
            <p class="h3" style="padding-bottom: 120px;">Sorry, we don't have any results that match your search. <a href="/" class="btn btn-info btn-sm">Go Home</a> </p>
        @endif
    @foreach($listings as $listing)
        <?php $url = URL::to($listing->thumbnail->url); ?>
        <div class="col-md-{{$colNum}} col-lg-{{$colNum}} col-sm-6 col-xs-12 listing-column">
            <div class="thumbnail">
                <div class ="caption">
                    <h3 class = "text-center">{{{ $listing->title }}}</h3>
                </div>
                <img src="{{ $url }}" alt="{{ $listing->thumbnail->alt_text }}" class="img-responsive">
                <br style="margin-bottom: 30px;">
                <a href="{{ action('ListingController@show', array($listing->space_type, $listing->id)) }}" class="btn btn-primary btn-large btn-block text-center">View Space</a>
           </div>

            <div class="listing-price pull-right" style="display: block;">
                <span class="currency" style="vertical-align: super; font-size: 11px;">$</span>
                <div class="text-danger lead" style="display: inline;">
                    <strong>{{{ $listing->daily_rate }}}</strong>
                </div>
                <span class="text-muted"><small>{{{ $listing->currency }}} (per day)</small></span>

            </div>
            <div class="pull-left">
                <p class="lead" style="display: block">{{{$listing->suburb}}}, {{{$listing->city}}}</p>
            </div>
            <br style="margin-bottom: 30px;">
            </div>

    @endforeach

    </div>
</div>
@stop

@section('fullwidth')
    @include('partial.emailorsignup')
@stop

