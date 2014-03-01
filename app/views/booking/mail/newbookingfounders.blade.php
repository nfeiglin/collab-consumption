
        <h1>A New Space has been booked ID: {{ $id }}</h1>
        <p>Hey founders, great news! A new booking has been made on Open Source Collaborative Consumption Marketplace</p>
     <h2>Details</h2>
        <p><b>Space Booked: </b> <a href="{{ action('ListingController@show', array($type, $id)) }}">{{{ $title }}}</a></p>
        <p><b>Space Location: </b> {{{ $address }}}</p>

        <p><b>From: </b> {{{ $request_start_datetime }}}</p>
        <p><b>To: </b>{{{ $request_end_datetime }}}</p>

     <h2>User Details</h2>
     <p><b>Name: </b>{{{$user_name }}}</p>
     <p><b>Phone: </b>{{{$user_phone }}}</p>
     <p><b>User Comments: </b>{{{$comments }}}</p>
     <hr>

     <p>Cheers,</p>
     <p>Your faithful Open Source Collaborative Consumption Marketplace Mail robot!</p>