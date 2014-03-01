@extends('layout.default')

@section('pagetitle')
Book Space: {{{$title}}}
@stop

@section('content')
{{HTML::style('css/padding.css')}}
{{ HTML::Style('css/bootstrap-datetimepicker.min.css') }}

<div class = "container">
    @if($errors->has())
    <div class ="alert alert-warning">
        Sorry, we're having errors with your input.
        <ul>
            @foreach($errors->all() as $message)
            <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class = "col-md-8 col-lg-8 col-sm-12 col-xs-12">


        <h1> Book Space</h1>
        <h2 class="text-primary">Space Details</h2>
        <p>Space name: <a href="{{action('ListingController@show',array($listing->space_type ,$listing->id))}}">{{{$listing->title}}}</a></p>
        <p>Address: {{{$address}}}</p>

        {{-- Form --}}
        {{ Form::open(array('action' => array('BookingController@store', $id))) }}
        {{-- Form::token()--}}
        <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12" id="form-container">

            <h2 class="text-primary">Booking Details</h2>
            {{-- user_phone --}}
            <div class="form-group">
                <label for="user_phone">Phone</label>

                <input type="text" class="form-control" id="user_phone" name="user_phone" value="{{Input::Old('user_phone')}}" placeholder="0400123456" required="required" autofocus>

                @if ($errors->first('user_phone'))

                {{ ($errors->first('user_phone', '<p class="text-warning">:message</p>')) }}

                @endif
                <p class="help-block">The best Australian phone number including area code for us and the space to contact you on regarding your booking. If we can't reach you via phone or email, you booking will not go through</p>

            </div>
            {{-- /user_phone --}}

            {{-- Times --}}
            <div class="form-group col-sm-6 col-xs-12 col-md-6 col-lg-6">

                    <label for="request_start_datetime">Start Date</label>
                    <div class="input-append date form_datetime" id="request_start_datetime">
                        <input class="form-control" size="16" value="" type="text" required="required" name="request_start_datetime">
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                <p class="help-block">The day and time you would like to start using the space</p>
             </div>

            <div class="form-group col-sm-6 col-xs-12 col-md-6 col-lg-6">
                    <label for="request_start_datetime">End Date</label>
                    <div class="input-append date form_datetime" id="request_end_datetime">
                        <input class="form-control" size="16" type="text" value="" required="required"  name="request_end_datetime">
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <p class="help-block">The day and time you need the space until.</p>
            </div>

            {{-- /Timedate --}}

            {{-- Comments --}}

            <div class="form-group">
                <h2 class="text-primary">Comments</h2>
                <textarea class="form-control" rows="3" cols="30" id="comments" name="comments" placeholder="Let us know about what you'll be working on at the space, what industry you work in and if you have any special requests or requirements" required="required">{{Input::Old('comments')}}</textarea>

                @if ($errors->first('comments'))

                {{ ($errors->first('comments', '<p class="text-warning">:message</p>')) }}

                @endif
                <p class="help-block">Let us know about what you'll be working on at the space, what industry you work in and if you have any special requests or requirements</p>
            </div>
            {{-- /Comments --}}

            {{-- Submit Button --}}

            <button type="submit" class="btn btn-success btn-block">Request space</button>
            <p class="help-block">We'll get back to you soon.</p>

            {{-- /Submit --}}

</div>
        </div>
    </div>
{{ HTML::Script('js/bootstrap-datetimepicker.min.js') }}
<script type="text/javascript">
    var currentDate = new Date(new Date().getTime() + 24 * 60 * 60 * 1000);
    var day = currentDate.getDate()
    var month = currentDate.getMonth() + 1
    var year = currentDate.getFullYear()
    var nathand = day + "-" + month + "-" + year;

   var datepicker =  $(".form_datetime").datetimepicker({
        format: "yyyy-mm-dd hh:ii:ss",
       startDate: nathand,
       minuteStep: 30

   });

    datepicker.setStartDate(nathand);

</script>

@stop