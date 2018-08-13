@extends('FontEnd.master')
@section('mainContent')
    <div class="show-top-grids">
        <div class="col-sm-10 show-grid-left main-grids">
            <div class="recommended">
                <div class="recommended-grids english-grid">

                    @if(isset($allSongs))
                        <?php
                        $i=1;
                        ?>
                        @foreach($allSongs as $allSong)
                    <div class="col-md-3 resent-grid recommended-grid movie-video-grid" style="margin-bottom: 2%">
                        <div class="resent-grid-img recommended-grid-img">
                            <a href="{{url('song/view/').'/'.$allSong->type.'/'.$allSong->id}}"><img src="{{asset($allSong->picture)}}" alt="" /></a>
                            <div class="time small-time show-time movie-time">
                                <p>7:34</p>
                            </div>
                            <div class="clck movie-clock">
                                <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                            <h5><a href="{{url('song/view/').'/'.$allSong->type.'/'.$allSong->id}}" class="title">{{$allSong->name}}</a></h5>
                            <ul>
                                <li><p class="author"><a href="{{url('song/view/').'/'.$allSong->type.'/'.$allSong->id}}" >{{$allSong->singer}}</a></p></li>

                            </ul>
                        </div>
                    </div>
                        @if($i%4==0)
                    <div class="clearfix"> </div>
                            @endif
                            <?php
                                    $i++;
                                ?>
                        @endforeach
                        @endif
                </div>
            </div>



        </div>

        <div class="col-md-2 show-grid-right">
            <h3>Languages</h3>
            @if(isset($languages))
                @foreach($languages as $language)
            <div class="show-right-grids">
                <ul>
                    <li class="tv-img"><a href="{{url('songs/').'/'.$language->language}}"><img src="{{asset('FontEnd/')}}/images/mv.png" alt="" /></a></li>
                    <li><a href="{{url('songs/').'/'.$language->language}}">{{$language->language}}</a></li>
                </ul>
            </div>
                @endforeach
            @endif
        </div>
        <div class="clearfix"> </div>
    </div>
    @endsection