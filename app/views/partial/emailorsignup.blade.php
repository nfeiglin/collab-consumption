<div class="jumbotron small-jumbo">

    <div class="container">
        @if(Auth::guest())
        <p class="h2 text-center text-primary">Sign Up</p>
        <form class="form-signin" action="{{action('ProfileController@store')}}" method="post">
            {{ Form::token() }}
            <div class="form-group">
                <input type="text" class="form-control" id="name" name="name" placeholder="Your full name" value="{{Input::Old('name')}}" required>
            </div>
            {{-- /Name --}}
            {{-- Email --}}
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" value="{{Input::Old('email')}}" placeholder="Your email" required>
            </div>
            {{-- /Email --}}

            {{-- Password --}}
            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Create a password (min 8 characters)" name="password" pattern="^.{6,}$" required>
            </div>
            {{-- /Password --}}

            {{-- Submit Button --}}
            <div class="form-group">
                <input type="submit" class="btn btn-success btn-block btn-lg" value="Sign Up" id="signup-btn">
            </div>
            {{-- /Submit --}}
        </form>

        <script>
            var button = $("#signup-btn");

            button.hover(function(e) {
                button.val("Go for it!");
            });

            button.mouseleave(function(e){
               button.val("Sign Up");
            });
        </script>
        @else

        <h1>Wow! You're already signed up. Now follow us on Twitter</h1>

        <a href="https://twitter.com/nfeiglin" class="twitter-follow-button" data-show-count="false" data-size="large" data-dnt="true">Follow @nfeiglin</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        <script>
            var button = $("#sub-email");

            button.hover(function(e) {
                button.val("Do it!");
            });

            button.mouseleave(function(e){
                button.val("Subscribe");
            });
        </script>
        @endif

        <small class="blood-orange">Badge by André Luiz Gollo from The Noun Project</small>
    </div>
</div>