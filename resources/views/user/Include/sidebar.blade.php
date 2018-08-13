<div class="col-sm-3 col-md-2 sidebar">
    <div class="top-navigation">
        <div class="t-menu">MENU</div>
        <div class="t-img">
            <img src="{{asset('FontEnd/')}}/images/lines.png" alt="" />
        </div>
        <div class="clearfix"> </div>
    </div>
    <div class="drop-navigation drop-navigation">
        <ul class="nav nav-sidebar">
            <li class="active"><a href="{{url('/user/dashboard')}}" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li><a href="history.html" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>History</a></li>
            <li><a href="#" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Movies<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
            <ul class="cl-effect-2">
                @if(isset($languages))
                    @foreach($languages as $lanuage)
                <li><a href="{{url('user/movie/').'/'.$lanuage->name}}">{{$lanuage->name}}</a></li>
                    @endforeach
                @endif
            </ul>
            <!-- script-for-menu -->
            <script>
                $( "li a.menu1" ).click(function() {
                    $( "ul.cl-effect-2" ).slideToggle( 300, function() {
                        // Animation complete.
                    });
                });
            </script>

            <!-- script-for-menu -->
            <script>
                $( "li a.menu" ).click(function() {
                    $( "ul.cl-effect-1" ).slideToggle( 300, function() {
                        // Animation complete.
                    });
                });
            </script>
            <li><a href="{{url('user/song')}}" class="song-icon"><span class="glyphicon glyphicon-music" aria-hidden="true"></span>Songs</a></li>

        </ul>
        <!-- script-for-menu -->
        <script>
            $( ".top-navigation" ).click(function() {
                $( ".drop-navigation" ).slideToggle( 300, function() {
                    // Animation complete.
                });
            });
        </script>

    </div>
</div>