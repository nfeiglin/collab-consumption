@extends('layout.default')

@section('pagetitle')
{{{$title}}}
@stop

@section('content')

<div class = "container">
    <div class="row">
        <div class="col-md-8">
            <div class="page-header" id="top-info">
                <h1 class="text-primary">{{{$title}}}</h1>

                <p class="text-primary">{{{$address}}}</p>
            </div>
        </div>
    </div>
</div>

<div class="row">

<div class="container panel panel-body">
<div class = "col-xs-12 col-sm-8 col-md-8 col-lg-8" id = "left-col">

    <div class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <!-- ############# Carousel goes here #######-->
        <div id="carousel-top" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <?php $url = URL::to($photos[0]['url'])?>
                    <img class="img-responsive" src="{{ $url }}" alt="{{{ $photos[0]['alt_text'] }}}">
                </div>
                @foreach($photos as $photo)
                @if (URL::to($photo['url']) != $url)
                <div class="item">
                    <img class="img-responsive" src="{{ URL::to($photo['url']) }}" alt="{{{ $photo['alt_text'] }}}">
                </div>
                @endif
                @endforeach
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-top" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="right carousel-control" href="#carousel-top" data-slide="next">
                <span class="icon-next"></span>
            </a>
        </div>
    </div>
    <!-- ######### End Carousel ### -->




<div id="elevator-pitch" class = "col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <h2 class="text-primary">The Elevator Pitch <small>A brief description of
            the desk</small></h2>

    <p class="lead">{{{ $elevator_pitch }}}</p>
</div>


<div class="col-xs-12 col-sm-12 col-md-3 col-lg-4 pull-right"
     id="key-info-table">
    <h2 class="text-primary">Key Amenities</h2>

    <table class="table table-hover">

        <tr>
            <td>WiFi</td>

            <td class="{{ $amenity['wifi'] }}"></td>
        </tr>

        <tr>
            <td>Parking</td>

            <td class="{{ $amenity['parking'] }}"></td>
        </tr>

        <tr>
            <td>Air Conditioning</td>

            <td class="{{ $amenity['aircon'] }}"></td>
        </tr>

        <tr>
            <td>Heating</td>

            <td class="{{ $amenity['heating'] }}"></td>
        </tr>

        <tr>
            <td>Coffee Machine</td>

            <td class="{{ $amenity['coffee_machine'] }}"></td>
        </tr>

        <tr>
            <td>Couches</td>

            <td class="{{ $amenity['couches']  }}"></td>
        </tr>
    </table>

    <!-- /div .col-xs-12 col-sm-8 col-md-4 pull-right number 2 -->
</div>



<div class="col-xs-12 col-sm-12 col-md-9 col-lg-8 pull-left" id = "long-desc">
    <h2 class="text-primary">Extended Description and House Rules</h2>

    <p>{{ $extended_desc }}</p>

</div>




<div id="faq" class = "col-xs-12 col-sm-12 col-md-12 col-lg-12 pull-left">



    <h2 class="text-primary">FAQ</h2>

    <p>{{ $faqs }}</p>

    <p style="margin-top: 50px">
        <a class="btn btn-success btn-lg btn-block" style="width: 50%" data-toggle =
        "modal" href="{{{$bookURL}}}">Book Now</a></p>
</div>

</div> <!-- end of left col -->

<!-- right col -->
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
    <h2 class="text-primary">The Basics</h2>

    <span class="text-danger lead"><strong>{{{ $daily_rate }}}</strong></span> <span class="text-muted"></span><small>per day</small></span>

    <p>{{{ $weekly_rate }}} per week</p>
    <p>{{{ $monthly_rate }}} per month</p>
    <p>Currency: {{{ $currency }}}</p>


    <p class="text-info">


        <strong>Address:</strong> {{{ $address }}} {{{ $postcode }}}

    </p>
    <!-- "panel panel-info"> -->

    <div class = "container panel panel-info">
        <div class="text-center">
<h2 class="text-primary">Listing posted by</h2>
            <p class="h3">{{{$ownername}}}</p>


        </div>
        <div>
            <a class="btn btn-success btn-lg btn-block" data-toggle =
               "modal" href="{{{$bookURL}}}">Book Now</a>
        </div>




        <h3 class="text-primary">Have a space like this?</h3>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left like-box">
            <a href="{{action('ListingController@create')}}" class="btn btn-block btn-sm btn-primary">List it</a>
        </div>
        <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2FWorld-Burrow%2F545316222215711&amp;width=200&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=477183865700383" scrolling="no" frameborder="0" style="border:none; overflow:hidden; color:#ffffff; background-color:#ffffff; width:170px; height:290px; padding-top: 30px; padding-bottom: 30px" allowTransparency="true"></iframe>


    </div><!-- container -->
</div><!-- row -->


</div>
</div>

@stop

@section('fullwidth')
    @include('partial.emailorsignup')
@stop

