@extends('user.master')
@section('mainContent')

    <div class="show-top-grids">
        @if(isset($movies))
            @foreach($movies as $movie)
                <div class="col-sm-8 single-left">
                    <div class="song" style="width:100%;">
                        <div class="song-info">
                            <h3>{{$movie->name}}</h3>
                        </div>
                        <div class="video-grid">
                            <iframe src="{{$movie->link}}" allowfullscreen></iframe>
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
                        {{--<div class="load_more">--}}
                        {{--<ul id="myList">--}}
                            {{--<li>--}}
                                {{--<h4>Published on 15 June 2015</h4>--}}
                                {{--<p>Nullam fringilla sagittis tortor ut rhoncus. Nam vel ultricies erat, vel sodales leo. Maecenas pellentesque, est suscipit laoreet tincidunt, ipsum tortor vestibulum leo, ac dignissim diam velit id tellus. Morbi luctus velit quis semper egestas. Nam condimentum sem eget ex iaculis bibendum. Nam tortor felis, commodo faucibus sollicitudin ac, luctus a turpis. Donec congue pretium nisl, sed fringilla tellus tempus in.</p>--}}
                            {{--</li>--}}
                            {{--<li>--}}
                                {{--<p>Nullam fringilla sagittis tortor ut rhoncus. Nam vel ultricies erat, vel sodales leo. Maecenas pellentesque, est suscipit laoreet tincidunt, ipsum tortor vestibulum leo, ac dignissim diam velit id tellus. Morbi luctus velit quis semper egestas. Nam condimentum sem eget ex iaculis bibendum. Nam tortor felis, commodo faucibus sollicitudin ac, luctus a turpis. Donec congue pretium nisl, sed fringilla tellus tempus in.</p>--}}
                                {{--<p>Nullam fringilla sagittis tortor ut rhoncus. Nam vel ultricies erat, vel sodales leo. Maecenas pellentesque, est suscipit laoreet tincidunt, ipsum tortor vestibulum leo, ac dignissim diam velit id tellus. Morbi luctus velit quis semper egestas. Nam condimentum sem eget ex iaculis bibendum. Nam tortor felis, commodo faucibus sollicitudin ac, luctus a turpis. Donec congue pretium nisl, sed fringilla tellus tempus in.</p>--}}
                                {{--<div class="load-grids">--}}
                                    {{--<div class="load-grid">--}}
                                        {{--<p>Category</p>--}}
                                    {{--</div>--}}
                                    {{--<div class="load-grid">--}}
                                        {{--<a href="movies.html">Entertainment</a>--}}
                                    {{--</div>--}}
                                    {{--<div class="clearfix"> </div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
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
                                <a href="{{url('movie/view/').'/'.$suggestion->type.'/'.$suggestion->id}}"><img src="{{asset($suggestion->picture)}}" alt="" /></a>
                            </div>
                            <div class="col-md-8 single-right-grid-right">
                                <a href="{{url('movie/view/').'/'.$suggestion->type.'/'.$suggestion->id}}" class="title">{{$suggestion->name}}</a>
                                <p class="author"><a href="#" class="author">{{$suggestion->director}}</a></p>
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