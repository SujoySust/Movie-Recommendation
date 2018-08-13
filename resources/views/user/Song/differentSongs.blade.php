@extends('user.master')
@section('mainContent')
    <div class="show-top-grids">
        <div class="col-sm-10 show-grid-left main-grids">
            <div class="recommended">
                <div class="recommended-info">
                    @if(isset($languages))
                        @foreach($languages as $language)
                    <div class="heading">
                        <h3>{{$language->language}}</h3>
                    </div>
                    <div class="heading-right">
                        <a  href="{{url('user/song')}}" >All Languages</a>
                    </div>
                    <div class="clearfix"> </div>
                        @endforeach
                    @endif
                </div>
                <div class="recommended-grids english-grid">
                    @if(isset($songs))
                        <?php
                        $i=1;
                        ?>
                        @foreach($songs as $song)

                    <div class="col-md-3 resent-grid recommended-grid movie-video-grid" style="margin-bottom: 2%">
                        <div class="resent-grid-img recommended-grid-img">
                            <a href="{{url('user/song/view/').'/'.$song->type.'/'.$song->id}}"><img src="{{asset($song->picture)}}" alt="" /></a>
                            <div class="time small-time show-time movie-time">
                                <p>7:34</p>
                            </div>
                            <div class="clck movie-clock">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                            <h5><a href="{{url('user/song/view/').'/'.$song->type.'/'.$song->id}}" class="title">{{$song->name}}</a></h5>
                            <ul>
                                <li><p class="author author-info"><a href="#" class="author">{{$song->singer}}</a></p></li>
                                <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                            </ul>
                        </div>
                    </div>
                           @if($i%4==0)
                                    <div class="clearfix"> </div>
                                @endif
                            <?php $i++?>
                        @endforeach
                    @endif

                        @if(isset($songsBytypes))
                            <?php
                            $i=1;
                            ?>
                            @foreach($songsBytypes as $song)

                                <div class="col-md-3 resent-grid recommended-grid movie-video-grid" style="margin-bottom: 2%">
                                    <div class="resent-grid-img recommended-grid-img">
                                        <a href="{{url('user/song/view/').'/'.$song->type.'/'.$song->id}}"><img src="{{asset($song->picture)}}" alt="" /></a>
                                        <div class="time small-time show-time movie-time">
                                            <p>7:34</p>
                                        </div>
                                        <div class="clck movie-clock">
                                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                                        <h5><a href="{{url('user/song/view/').'/'.$song->type.'/'.$song->id}}" class="title">{{$song->name}}</a></h5>
                                        <ul>
                                            <li><p class="author author-info"><a href="#" class="author">{{$song->singer}}</a></p></li>
                                            <li class="right-list"><p class="views views-info">2,114,200 views</p></li>
                                        </ul>
                                    </div>
                                </div>
                                @if($i%4==0)
                                    <div class="clearfix"> </div>
                                @endif
                                <?php $i++?>
                            @endforeach
                        @endif


                </div>
            </div>


            </div>
        <div class="col-md-2 show-grid-right">
            <h3>Songs Types</h3>
            <div class="show-right-grids">

                <ul>
                    <li class="tv-img"><a href="#"><img src="{{asset('FontEnd/')}}/images/mv.png" alt="" /></a></li>
                    @if(isset($languages))
                        @foreach($languages as $language)
                            <li><a href="{{url('user/songs/'.$language->language)}}">All Types</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
            @if(isset($types))
                @foreach($types as $type)
            <div class="show-right-grids">

                <ul>
                    <li class="tv-img"><a href="#"><img src="{{asset('FontEnd/')}}/images/mv.png" alt="" /></a></li>
                    @if(isset($languages))
                        @foreach($languages as $language)
                    <li><a href="{{url('user/songs/'.$language->language.'/'.$type->type)}}">{{$type->type}}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>
                @endforeach
            @endif

        </div>
        <div class="clearfix"> </div>
    </div>
    @endsection