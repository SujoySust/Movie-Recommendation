<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('user/dashboard')}}"><h1><img src="{{asset('FontEnd/')}}/images/logo.png" alt="" /></h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <div class="top-search">
                <form class="navbar-form navbar-right">
                    <input type="text" class="form-control" placeholder="Search...">
                    <input type="submit" value=" ">
                </form>
            </div>
            <div class="header-top-right">
                <div class="signin">
                    <li class="dropdown" style="text-decoration: none">
                        <a href="#small-dialog2" data-toggle="dropdown" class="dropdown-toggle">
                           {{Auth::guard('user')->user()->name}}

                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout</a>

                                <form id="logout-form" action="{{ url('user/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>

                    <!-- pop-up-box -->
                    <script type="text/javascript" src="{{asset('FontEnd/')}}/js/modernizr.custom.min.js"></script>
                    <link href="{{asset('FontEnd/')}}/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
                    <script src="{{asset('FontEnd/')}}/js/jquery.magnific-popup.js" type="text/javascript"></script>
                    <!--//pop-up-box -->


                    <script>
                        $(document).ready(function() {
                            $('.popup-with-zoom-anim').magnificPopup({
                                type: 'inline',
                                fixedContentPos: false,
                                fixedBgPos: true,
                                overflowY: 'auto',
                                closeBtnInside: true,
                                preloader: false,
                                midClick: true,
                                removalDelay: 300,
                                mainClass: 'my-mfp-zoom-in'
                            });

                        });
                    </script>
                </div>


            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</nav>