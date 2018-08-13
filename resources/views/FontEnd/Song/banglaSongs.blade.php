@extends('FontEnd.master')
@section('mainContent')
    <div class="show-top-grids">
        <div class="col-sm-10 show-grid-left main-grids">
            <div class="recommended">
                <div class="recommended-grids english-grid">
                    <div class="recommended-info">
                        <div class="heading">
                            <h3>English</h3>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="col-md-3 resent-grid recommended-grid movie-video-grid">
                        <div class="resent-grid-img recommended-grid-img">
                            <a href="single.html"><img src="{{asset('FontEnd/')}}/images/mv1.jpg" alt="" /></a>
                            <div class="time small-time show-time movie-time">
                                <p>7:34</p>
                            </div>
                            <div class="clck movie-clock">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                            <h5><a href="single.html" class="title">Varius sit sed viverra Nullam interdum metus</a></h5>
                            <ul>
                                <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 resent-grid recommended-grid movie-video-grid">
                        <div class="resent-grid-img recommended-grid-img">
                            <a href="single.html"><img src="{{asset('FontEnd/')}}/images/mv2.jpg" alt="" /></a>
                            <div class="time small-time show-time movie-time">
                                <p>9:34</p>
                            </div>
                            <div class="clck movie-clock">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                            <h5><a href="single.html" class="title">Varius sit sed viverra Nullam interdum metus</a></h5>
                            <ul>
                                <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 resent-grid recommended-grid movie-video-grid">
                        <div class="resent-grid-img recommended-grid-img">
                            <a href="single.html"><img src="{{asset('FontEnd/')}}/images/mv3.jpg" alt="" /></a>
                            <div class="time small-time show-time movie-time">
                                <p>3:04</p>
                            </div>
                            <div class="clck movie-clock">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                            <h5><a href="single.html" class="title">Varius sit sed viverra Nullam interdum metus</a></h5>
                            <ul>
                                <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 resent-grid recommended-grid movie-video-grid">
                        <div class="resent-grid-img recommended-grid-img">
                            <a href="single.html"><img src="{{asset('FontEnd/')}}/images/mv4.jpg" alt="" /></a>
                            <div class="time small-time show-time movie-time">
                                <p>2:06</p>
                            </div>
                            <div class="clck movie-clock">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                            <h5><a href="single.html" class="title">Varius sit sed viverra Nullam interdum metus</a></h5>
                            <ul>
                                <li><p class="author author-info"><a href="#" class="author">John Maniya</a></p></li>
                                <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>


            </div>
        <div class="col-md-2 show-grid-right">
            <h3>Songs Types</h3>
            @if(isset($types))
                @foreach($types as $type)
            <div class="show-right-grids">
                <ul>
                    <li class="tv-img"><a href="#"><img src="{{asset('FontEnd/')}}/images/mv.png" alt="" /></a></li>
                    <li><a href="#">{{$type->type}}</a></li>
                </ul>
            </div>
                @endforeach
            @endif

        </div>
        <div class="clearfix"> </div>
    </div>
    @endsection