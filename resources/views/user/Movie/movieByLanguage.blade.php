@extends('user.master')
@section('mainContent')
    <div class="show-top-grids">
        <div class="col-sm-10 show-grid-left main-grids">
            <div class="recommended">
                <div class="recommended-grids english-grid">

                    @if(isset($movieByLanguages))
                        <?php
                        $i=1;
                        ?>
                        @foreach($movieByLanguages as $movieByLanguage)
                            <div class="col-md-3 resent-grid recommended-grid movie-video-grid" style="margin-bottom: 2%">
                                <div class="resent-grid-img recommended-grid-img">
                                    <a href="{{url('user/movie/view/').'/'.$movieByLanguage->type.'/'.$movieByLanguage->id}}"><img src="{{asset($movieByLanguage->picture)}}" alt="" /></a>
                                    <div class="time small-time show-time movie-time">
                                        <p>7:34</p>
                                    </div>
                                    <div class="clck movie-clock">
                                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                                    <h5><a href="{{url('user/movie/view/').'/'.$movieByLanguage->type.'/'.$movieByLanguage->id}}" class="title">{{$movieByLanguage->name}}</a></h5>
                                    <ul>
                                        <li><p class="author"><a href="{{url('user/song/view/').'/'.$movieByLanguage->type.'/'.$movieByLanguage->id}}" >{{$movieByLanguage->director}}</a></p></li>

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

                        @if(isset($searchByLanguages))
                            <?php
                            $i=1;
                            ?>
                            @foreach($searchByLanguages as $movieByLanguage)
                                <div class="col-md-3 resent-grid recommended-grid movie-video-grid" style="margin-bottom: 2%">
                                    <div class="resent-grid-img recommended-grid-img">
                                        <a href="{{url('user/movie/view/').'/'.$movieByLanguage->type.'/'.$movieByLanguage->id}}"><img src="{{asset($movieByLanguage->picture)}}" alt="" /></a>
                                        <div class="time small-time show-time movie-time">
                                            <p>7:34</p>
                                        </div>
                                        <div class="clck movie-clock">
                                            <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="resent-grid-info recommended-grid-info recommended-grid-movie-info">
                                        <h5><a href="{{url('user/movie/view/').'/'.$movieByLanguage->type.'/'.$movieByLanguage->id}}" class="title">{{$movieByLanguage->name}}</a></h5>
                                        <ul>
                                            <li><p class="author"><a href="{{url('user/song/view/').'/'.$movieByLanguage->type.'/'.$movieByLanguage->id}}" >{{$movieByLanguage->director}}</a></p></li>

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
            <h3>Search</h3>
            <div class="form-group">
                <form class="form-group" action="{{url('user/movie/searchByLanguage')}}" method="post">
                    {{csrf_field()}}
                    @if($country)
                    <input type="hidden" name="countries" value="{{$country}}">
                    @endif
                <select class="form-group" style="width: 100%" name="id">
                    <option>Select Actors</option>
                    @foreach($actors as $actor)
                    <option value="{{$actor->id}}">{{$actor->name}}</option>
                    @endforeach
                </select>
                    <div class="clearfix"></div>
                <select class="form-group" style="width: 100%" name="type">
                    <option>Select Movie Type</option>
                    @foreach($types as $type)
                    <option value="{{$type->type}}">{{$type->type}}</option>
                    @endforeach

                </select>
                    <div class="clearfix"></div>
                    <input type="submit" value="Search">

                </form>
            </div>
            <div class="clearfix"></div>

                <h3>Languages</h3>
                @if(isset($languages))
                    @foreach($languages as $language)
                        <div class="show-right-grids">
                            <ul>
                                <li class="tv-img"><a href="{{url('user/movie/').'/'.$language->name}}"><img src="{{asset('FontEnd/')}}/images/mv.png" alt="" /></a></li>
                                <li><a href="{{url('user/movie/').'/'.$language->name}}">{{$language->name}}</a></li>
                            </ul>
                        </div>
                    @endforeach
                @endif

        </div>


        <div class="clearfix"> </div>
    </div>
@endsection