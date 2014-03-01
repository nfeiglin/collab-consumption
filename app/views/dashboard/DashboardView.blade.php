@extends('layout.default')

    @section('pagetitle')
    Dashboard
    @stop
@section('content')
{{HTML::style('css/padding.css')}}

<h1 class = "form-signin-heading container text-primary">My Dashboard</h1>

<div class = "container">
<h1>Hi there, {{{$name}}}! <small>{{{$email}}}</small></h1>
<p>This is your dashboard where you can see your space listings and bookings</p>

    <h2 class="text-primary">My Space Listings</h2>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-responsive">
            <thead>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Elevator Pitch</td>
                <td>Address</td>
                <td>Suburb</td>
                <td>State</td>
                <td>Postcode</td>
                <td>View</td>
                <td>Edit</td>
            </tr>
            </thead>
            <tbody>
            @foreach($my_spaces as $space)
            <tr>
                <td>{{ $space->id }}</td>
                <td>{{{ $space->title }}}</td>
                <td>{{ $space->elevator_pitch }}</td>
                <td>{{{ $space->address1 }}}</td>
                <td>{{{ $space->suburb }}}</td>
                <td>{{{ $space->state }}}</td>
                <td>{{{ $space->postcode }}}</td>

                <!-- we will also add show, edit, and delete buttons -->
                <td>
                    {{Form::open(array('url' => action('ListingController@visibility', $space->id), 'method' => 'put')) }}
                   {{--  <input type="hidden" value="{{ $space->id }}" name="id"> --}}
                    @if($space->isPublic == 1)
                    <button value="submit" class="btn btn-sm btn-default">Make private</button>
                    @elseif($space->isPublic == 0)
                    <button value="submit" class="btn btn-success btn-sm">Make public</button>
                    @endif
                    {{Form::close()}}
                </td>
                <td><a class="btn btn-small btn-warning" href="{{ action('ListingController@show', array($space->space_type, $space->id)) }}">Edit</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{action('ListingController@create')}}" class="btn btn-lg btn-info">List new space</a>
        <p>Contact us if you wish to update your listing.</p>
    </div>


    <h2 class="text-primary">Bookings of my spaces</h2>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-responsive">
            <thead>
            <tr>
                <td>ID</td>
                <td>Space Booked</td>
                <td>Name</td>
                <td>Phone Number</td>
                <td>Message</td>
                <td>Booking from</td>
                <td>Booking to</td>
                <td>Status</td>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings_of_my_spaces as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td><a href="{{action('ListingController@show', array($booking->listing->space_type, $booking->listing->id)) }}">{{{ $booking->listing->title }}}</a></td>
                <td>{{ $booking->user_name }}</td>
                <td>{{{ $booking->user_phone }}}</td>
                <td>{{ $booking->user_comments }}</td>
                <td>{{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->request_start_datetime)->toDayDateTimeString() }}}</td>
                <td>{{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->request_end_datetime)->toDayDateTimeString() }}}</td>
                <td>{{{ $booking->status }}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <p>Contact us if you have any questions about bookings of your spaces.</p>
    </div>

    <h2 class="text-primary">Bookings I have made</h2>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <table class="table table-responsive">
            <thead>
            <tr>
                <td>ID</td>
                <td>Space Booked</td>
                <td>Message</td>
                <td>Booking from</td>
                <td>Booking to</td>
                <td>Status</td>
            </tr>
            </thead>
            <tbody>
            @foreach($personal_bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td><a href="{{action('ListingController@show', array($booking->listing->space_type, $booking->listing->id)) }}">{{{ $booking->listing->title }}}</a></td>
                <td>{{ $booking->user_comments }}</td>
                <td>{{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->request_start_datetime)->toDayDateTimeString() }}}</td>
                <td>{{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $booking->request_end_datetime)->toDayDateTimeString() }}}</td>
                <td>{{{ $booking->status }}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <p>Contact us if you wish to change your bookings.</p>
    </div>
</div>
@stop