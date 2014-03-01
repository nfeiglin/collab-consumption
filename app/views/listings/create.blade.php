@extends('layout.default')

@section('pagetitle')
Listing your space
@stop
@section('content')
{{HTML::style('css/padding.css')}}
<h2 class = "container text-primary">Listing your Space</h2>
<style>
    input.switch:empty
    {
        margin-left: -999px;
    }

    input.switch:empty ~ label
    {
        position: relative;
        float: left;
        line-height: 1.6em;
        text-indent: 4em;
        margin: 0.2em 0;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    input.switch:empty ~ label:before,
    input.switch:empty ~ label:after
    {
        position: absolute;
        display: block;
        top: 0;
        bottom: 0;
        left: 0;
        content: ' ';
        width: 3.6em;
        background-color: #c33;
        border-radius: 0.3em;
        box-shadow: inset 0 0.2em 0 rgba(0,0,0,0.3);
        -webkit-transition: all 100ms ease-in;
        transition: all 100ms ease-in;
    }

    input.switch:empty ~ label:after
    {
        width: 1.4em;
        top: 0.1em;
        bottom: 0.1em;
        margin-left: 0.1em;
        background-color: #fff;
        border-radius: 0.15em;
        box-shadow: inset 0 -0.2em 0 rgba(0,0,0,0.2);
    }

    input.switch:checked ~ label:before
    {
        background-color: #393;
    }

    input.switch:checked ~ label:after
    {
        margin-left: 2.1em;
    }
</style>

    <div class = "container">
        @if($errors->has())
        <div class ="alert alert-warning">
            <a class="close" data-dismiss="alert" href="#" aria-hidden="true">&times;</a>
            Sorry, we're having errors with your input.
            <ul>
                @foreach($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <div class = "col-md-8 col-lg-8 col-sm-12 col-xs-12">


            {{-- Form --}}
           {{ Form::open(array('action' => 'ListingController@store', 'files' => true)) }}
                <div class="col-lg-12 col-xs-12 col-md-12 col-sm-12" id="form-container">
            <h2 class="text-primary">Desk Details</h2>

                    {{-- Thumbnail --}}
                    <div class="form-group">
                        <label for="title">Thumbnail</label>

                        <input type="file" class="form-control" id="thumbnail" name="thumbnail" required accept="image/*">

                        @if ($errors->first('thumbnail'))

                        {{ ($errors->first('thumbnail', '<p class="text-warning">:message</p>')) }}

                        @else
                        <p class="help-block">Upload a 300 x 200px thumbnail of the space to be used on the listing and search results page. Max size 2MB. Image will be cropped if it is a different size.</p>
                        @endif
                    </div>
                    {{-- /Thumnail --}}


                        {{-- Title --}}
            <div class="form-group">
                <label for="title">Title</label>

                <input type="text" class="form-control" id="title" name="title" value="{{Input::Old('title')}}" placeholder="Write a snazzy title" required autofocus>

                @if ($errors->first('title'))

                {{ ($errors->first('title', '<p class="text-warning">:message</p>')) }}

                @else
                <p class="help-block">Create a relevant title to describe your listing. For example: Large boardroom with video conference facilities or Beach-themed corporate event space</p>
                @endif
            </div>
            {{-- /Title --}}

                        {{-- Elevator Pitch --}}
                        <div class="form-group">
                            <label for="elevator_pitch">Elevator Pitch</label>
                                <textarea class="form-control" rows="3" cols="30" id="elevator_pitch" name="elevator_pitch" placeholder="Write an interesting short description that quickly outlines the space you are offering..." required>{{Input::Old('elevator_pitch')}}</textarea>

                                @if ($errors->first('elevator_pitch'))

                                {{ ($errors->first('elevator_pitch', '<p class="text-warning">:message</p>')) }}

                                @else
                                <p class="help-block">Write a short description describing your space, the key facilities and anything else you think is work mentioning</p>
                                @endif
                            </div>

                        {{-- /Elevator Pitch --}}

                {{-- Type --}}

            <h2 class="text-primary">Space Type</h2>
            <select class="form-control" name="space_type" required="required">
                <option value="coworking">Coworking space</option>
                <option value="desk">Desk space</option>
                <option value="meeting-room">Meeting room</option>
            </select>
            @if ($errors->first('space_type'))
            {{ ($errors->first('space_type', '<p class="text-warning">:message</p>')) }}
            @endif
                {{-- /Type --}}

                    <h2 class="text-primary">Amenities</h2>
            <p class="help-block">Select all the features that your space has.</p>
            {{-- Amenities --}}
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <input type="checkbox" id="wifi" name="wifi" class="switch" @if(isset($input['wifi'])) checked="checked" @endif/>
                    <label for="wifi">WiFi</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="coffee" name="coffee" class="switch" @if(isset($input['coffee'])) checked="checked" @endif/>
                    <label for="coffee">Coffee Machine</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="heating" name="heating" class="switch" @if(isset($input['heating'])) checked="checked" @endif/>
                    <label for="heating">Heating</label>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <input type="checkbox" id="parking" name="parking" class="switch" @if(isset($input['parking'])) checked="checked" @endif/>
                    <label for="parking">On-site Parking</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="aircon" name="aircon" class="switch" @if(isset($input['aircon'])) checked="checked" @endif/>
                    <label for="aircon">Air Conditioning</label>
                </div>

                <div class="form-group">
                    <input type="checkbox" id="couches" name="couches" class="switch" @if(isset($input['couches'])) checked="checked" @endif/>
                    <label for="couches">Couches</label>
                </div>
            </div>

            {{-- /Amenities --}}


                    {{-- Extended Description --}}
                    <div class="form-group">
                        <label for="extended_desc">Extended Description & Rules of The Space </label>
                        <textarea class="form-control" rows="5" cols="30" id="extended_desc" name="extended_desc" placeholder="What else to you have to say about your space? Do you have any specific rules or requirements?" required>{{Input::Old('extended_desc')}}</textarea>

                        @if ($errors->first('extended_desc'))

                        {{ ($errors->first('extended_desc', '<p class="text-warning">:message</p>')) }}

                        @else
                        <p class="help-block">Haven't covered it all in your elevator pitch? Describe your space, the culture, the people, and the rules.</p>
                        @endif
                    </div>

                    {{-- /Extended Description --}}

                    {{-- FAQs --}}
                    <div class="form-group">
                        <label for="faqs">FAQs</label>
                        <textarea class="form-control" rows="5" cols="30" id="faqs" name="faqs" placeholder="What questions are often asked about your space?" required>{{Input::Old('faqs')}}</textarea>

                        @if ($errors->first('faqs'))

                        {{ ($errors->first('faqs', '<p class="text-warning">:message</p>')) }}

                        @else
                        <p class="help-block">Think what your users are going to be asking about and answer in a Q and A format. Discuss hours and days of access and if you have discounts depending on the person's use of the space.</p>
                        @endif
                    </div>

                    {{-- /FAQs --}}

            {{-- Space Images --}}
            <div class="form-group">
                <label for="title">Images of your Space</label>

                <input type="file" class="form-control" id="photos" name="photos[]" required accept="image/*" multiple="multiple">

                @if ($errors->first('photos'))

                {{ ($errors->first('photos', '<p class="text-warning">:message</p>')) }}

                @else
                <p class="help-block">Upload images to be displayed in the gallery on your listing's page. Images will be cropped to 800x450. 6MB max for all images.</p>
                @endif
            </div>
            {{-- /Space Images --}}

                    {{-- pricing --}}
                    <div class="form-group">
                        <label for="daily_rate">Daily Rate</label>
                        <input type="number" class="form-control" id="daily_rate" name="daily_rate" value="{{Input::Old('daily_rate')}}" placeholder="29.00" max="999" min="0" step="any" required>
                        @if ($errors->first('daily_rate'))

                        {{ ($errors->first('daily_rate', '<p class="text-warning">:message</p>')) }}

                        @else
                        <p class="help-block">Your standard daily rate including GST.</p>
                        @endif
                    </div>


            <div class="form-group">
                <label for="weekly_rate">Weekly Rate</label>
                <input type="number" class="form-control" id="weekly_rate" name="weekly_rate" value="{{Input::Old('weekly_rate')}}" placeholder="199.00" max="9999" min="0" step="any" required>
                @if ($errors->first('weekly_rate'))

                {{ ($errors->first('weekly_rate', '<p class="text-warning">:message</p>')) }}

                @else
                <p class="help-block">Your standard weekly rate including GST.</p>
                @endif
            </div>

            <div class="form-group">
                <label for="monthly_rate">Monthly Rate</label>
                <input type="number" class="form-control" id="monthly_rate" name="monthly_rate" value="{{Input::Old('monthly_rate')}}" placeholder="749.00" max="99999" min="0" step="any" required>
                @if ($errors->first('monthly_rate'))

                {{ ($errors->first('monthly_rate', '<p class="text-warning">:message</p>')) }}

                @else
                <p class="help-block">Your standard monthly rate including GST.</p>
                @endif
            </div>

            <div class="form-group">
                <label for="currency">Currency</label>
                <p class="form-control-static">AUD</p>
                <p class="help-block">More currency support coming soon.</p>

            </div>

                    {{-- /pricing --}}

                    <h2 class="text-primary">Location Details</h2>

                    {{-- Address1 --}}
                    <div class="form-group">
                        <label for="address1">Address</label>

                        <input type="text" class="form-control" id="address1" name="address1" value="{{Input::Old('address1')}}" placeholder="Level 2, 1 Burrow Lane" required>

                        @if ($errors->first('address1'))

                        {{ ($errors->first('address1', '<p class="text-warning">:message</p>')) }}

                        @else
                        <p class="help-block">Your address. Please use "Street" rather than "St" or "Lane" instead of "Ln" etc.</p>
                        @endif
                    </div>
                    {{-- /Address1 --}}

                    {{-- Suburb --}}
                    <div class="form-group">
                        <label for="suburb">Suburb</label>

                        <input type="text" class="form-control" id="suburb" name="suburb" value="{{Input::Old('suburb')}}" placeholder="Ultimo" required>

                        @if ($errors->first('suburb'))

                        {{ ($errors->first('suburb', '<p class="text-warning">:message</p>')) }}

                        @else
                        <p class="help-block">The suburb your space is located in.</p>
                        @endif
                    </div>
                    {{-- /Suburb --}}

                    {{-- City --}}
                    <div class="form-group">
                        <label for="city">City</label>

                        <input type="text" class="form-control" id="city" name="city" value="{{Input::Old('city')}}" placeholder="Sydney" required="required">

                        @if ($errors->first('city'))

                        {{ ($errors->first('city', '<p class="text-warning">:message</p>')) }}

                        @else
                        <p class="help-block">The greater city region your space is located in ie. Melbourne, Sydney etc.</p>
                        @endif
                    </div>
                    {{-- /City --}}

                    {{-- State --}}
                    <div class="form-group">
                        <label for="state">State</label>

                        <input type="text" class="form-control" id="state" name="state" value="{{Input::Old('state')}}" placeholder="New South Wales">

                        @if ($errors->first('state'))

                        {{ ($errors->first('state', '<p class="text-warning">:message</p>')) }}

                        @else
                        <p class="help-block">The state your space is located in ie. Victoria, New South Wales etc. <b>Do not</b> use shorthand (Vic, NSW)</p>
                        @endif
                    </div>
                    {{-- /State --}}

                    {{-- Country --}}
                    <div class="form-group">
                        <label for="country">Country</label>

                        <input type="text" class="form-control" id="country" name="country" value="Australia" placeholder="Australia" required>

                        @if ($errors->first('country'))

                        {{ ($errors->first('country', '<p class="text-warning">:message</p>')) }}

                        @else
                        <p class="help-block">The country your space is located in. <b>Do not</b> use shorthand (AU, NZ)</p>
                        @endif
                    </div>
                    {{-- /Country --}}

            {{-- Postcode --}}
            <div class="form-group">
                <label for="postcode">Postcode</label>

                <input type="text" class="form-control" id="postcode" name="postcode" value="{{ Input::old('postcode') }}" placeholder="2000" pattern="(\d{4})" required>

                @if ($errors->first('postcode'))

                {{ ($errors->first('postcode', '<p class="text-warning">:message</p>')) }}

                @else
                <p class="help-block">The postcode your space is located in.</p>
                @endif
            </div>
            {{-- /Postcode --}}


                    {{-- Submit Button --}}

                        <button type="submit" class="btn btn-success btn-block">Submit</button>

                    {{-- /Submit --}}
            </form>

        </div> {{-- Close form container --}}

    </div> {{-- Close Column --}}

    </div> {{-- Close Containter --}}

<script>var checkbox=$("input[type=checkbox]");checkbox.change(function(){if($(this).prop("checked")){$(this).attr("checked","checked")} else{$(this).removeAttr("checked")}});</script>
    @stop


