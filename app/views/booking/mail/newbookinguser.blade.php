
        <h1>Open Source Collaborative Consumption Marketplace Booking: #{{ $id }}</h1>
        <p>Hey {{{ $user_name }}}, great news! Your new booking request on Open Source Collaborative Consumption Marketplace has been made!</p>
        <p>We'll review your request and get back to you ASAP with a confirmation or any questions.</p>
        <p>If you have any questions in the meantime, you can contact us at <a href="mailto:founders@worldburrow.com?Subject=World%20Burrow%20Support%20for%20Request%20Booking%20ID%20%23{{ $id }}">founders@worldburrow.com</a></p>
     <h2>Details</h2>
        <p><b>Space Booked: </b> <a href="{{ action('ListingController@show', array($type, $id)) }}">{{{ $title }}}</a></p>
        <p><b>Space Location: </b> {{{ $address }}}</p>

        <p><b>From: </b> {{{ $request_start_datetime }}}</p>
        <p><b>To: </b>{{{ $request_end_datetime }}}</p>
        <p><b>Status: </b>{{{ $status }}}</p>
     <h2>Your Details</h2>
     <p><b>Name: </b>{{{$user_name }}}</p>
     <p><b>Phone: </b>{{{$user_phone }}}</p>
     <p><b>User Comments: </b>{{{$comments }}}</p>
     <hr>

     <p>Cheers,</p>
     <p>Your faithful Open Source Collaborative Consumption Marketplace Mail robot!</p>