<!--header start here-->
<div class="header-main">
    <div class="logo-w3-agile">
        <h1><a href="{{url('admin/dashboard')}}">My Play</a></h1>
    </div>


    <div class="profile_details w3l">
        <ul>
            <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <div class="profile_img">
                        <span class="prfil-img"><img src="{{asset('Admin/')}}/images/in4.jpg" alt=""> </span>
                        <div class="user-name">
                            <p>{{Auth::guard('admin')->user()->name}}</p>
                            <span>Administrator</span>
                        </div>
                        <i class="fa fa-angle-down"></i>
                        <i class="fa fa-angle-up"></i>
                        <div class="clearfix"></div>
                    </div>
                </a>
                <ul class="dropdown-menu drp-mnu">
                    <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                    <li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>
                    <li> <a href="{{ url('admin/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>

                        <form id="logout-form" action="{{ url('admin/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <div class="clearfix"> </div>
</div>
<!--heder end here-->