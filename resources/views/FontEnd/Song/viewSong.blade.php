@extends('FontEnd.master')
@section('mainContent')

    <div class="show-top-grids">
        @if(isset($songs))
            @foreach($songs as $song)
                <div class="col-sm-8 single-left">
                    <div class="song" style="width:100%;">
                        <div class="song-info">
                            <h3>{{$song->name}}</h3>
                        </div>
                        <div class="video-grid">
                            <iframe src="{{$song->link}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                        </div>
                    </div>

                    <div class="clearfix"> </div>
                    <div class="published">
                        <script src="{{asset('FontEnd/')}}/jquery.min.js"></script>
                        <script>
                            $(document).ready(function () {
                                size_li = $("#myList li").size();
                                x=1;
                                $('#myList li:lt('+x+')').show();
                                $('#loadMore').click(function () {
                                    x= (x+1 <= size_li) ? x+1 : size_li;
                                    $('#myList li:lt('+x+')').show();
                                });
                                $('#showLess').click(function () {
                                    x=(x-1<0) ? 1 : x-1;
                                    $('#myList li').not(':lt('+x+')').hide();
                                });
                            });
                        </script>

                    </div>

                </div>
            @endforeach
        @endif
        <div class="col-md-4 single-right">
            <h3>Up Next</h3>
            <div class="single-grid-right">
                @if(isset($suggestions))
                    @foreach($suggestions as $suggestion)
                <div class="single-right-grids">
                    <div class="col-md-4 single-right-grid-left">
                        <a href="{{url('song/view/').'/'.$suggestion->type.'/'.$suggestion->id}}"><img src="{{asset($suggestion->picture)}}" alt="" /></a>
                    </div>
                    <div class="col-md-8 single-right-grid-right">
                        <a href="{{url('song/view/').'/'.$suggestion->type.'/'.$suggestion->id}}" class="title">{{$suggestion->name}}</a>
                        <p class="author"><a href="#" class="author">{{$suggestion->singer}}</a></p>
                        <p class="views">2,114,200 views</p>
                    </div>
                    <div class="clearfix"> </div>
                </div>

                    @endforeach
                @endif

            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
@endsection