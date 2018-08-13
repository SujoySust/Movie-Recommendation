<!--/sidebar-menu-->
<div class="sidebar-menu">
    <header class="logo1">
        <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
    </header>
    <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
    <div class="menu">
        <ul id="menu" >
            <li><a href="{{url('admin/dashboard')}}"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>

            <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Songs Categories</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" style="width: 100%"><a href="{{url('admin/language/add')}}">Add Language</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/language/manage')}}">Manage Language</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/type/add')}}">Add Type</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/type/manage')}}">Manage Type</a></li>
                </ul>
            </li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span> Movie Categories</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" style="width: 100%"><a href="{{url('admin/movie/language/add')}}">Add Language</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/movie/language/manage')}}">Manage Language</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/movie/type/add')}}">Add Type</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/movie/type/manage')}}">Manage Type</a></li>
                </ul>
            </li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-list-ul" aria-hidden="true"></i><span>Actors</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" style="width: 100%"><a href="{{url('admin/movie/actor/add')}}">Add Actors</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/movie/actor/manage')}}">Manage Actors</a></li>
                </ul>
            </li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Songs</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/song/add')}}">Add New Song</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/song/manage')}}">Mange Songs</a></li>

                </ul>
            </li>
            <li id="menu-academico" ><a href="#"><i class="fa fa-picture-o" aria-hidden="true"></i><span>Movies</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
                <ul id="menu-academico-sub" >
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/movie/add')}}">Add New Movie</a></li>
                    <li id="menu-academico-avaliacoes" ><a href="{{url('admin/movie/manage')}}">Manage Movies</a></li>

                </ul>
            </li>



        </ul>
    </div>
</div>
<div class="clearfix"></div>