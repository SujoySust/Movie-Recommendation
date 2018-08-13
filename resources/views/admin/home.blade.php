@extends('admin.master')

@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>
    </ol>
    <!--four-grids here-->
    <div class="four-grids">
        <div class="col-md-3 four-grid">
            <div class="four-agileits">
                <div class="icon">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>User</h3>

                    <h4> {{App\User::count()}} </h4>

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-agileinfo">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Movies</h3>
                    <h4>{{App\Movie::count()}}</h4>

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-w3ls">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Songs</h3>
                    <h4>{{App\Song::count()}}</h4>

                </div>

            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-wthree">
                <div class="icon">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Actors</h3>
                    <h4>{{App\Actor::count()}}</h4>

                </div>

            </div>
        </div>
        <div class="clearfix"></div>
    </div>

      <div class="clearfix"></div>

    <!--//photoday-section-->
    <!--w3-agileits-pane-->
    <div class="w3-agileits-pane" style="margin-bottom: 5%">

        <div class="col-md-6 agile-info-stat">
            <div class="stats-info stats-last widget-shadow">
                <h3 style="text-align: center">Song Language</h3>
                <table class="table stats-table ">
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Languages</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @if(isset($songLanguages))
                    @foreach($songLanguages as $language)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$language->language}}</td>

                        </tr>

                    @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 agile-info-stat">
            <div class="stats-info stats-last widget-shadow">
                <h3 style="text-align: center">Song Types</h3>
                <table class="table stats-table ">
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Song Types</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @if(isset($songTypes))
                        @foreach($songTypes as $type)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$type->type}}</td>

                            </tr>

                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
    <div class="w3-agileits-pane" style="margin-bottom: 5%">

        <div class="col-md-6 agile-info-stat">
            <div class="stats-info stats-last widget-shadow">
                <h3 style="text-align: center">Movie Language</h3>
                <table class="table stats-table ">
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Languages</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @if(isset($movieLanguages))
                        @foreach($movieLanguages as $language)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$language->name}}</td>

                            </tr>

                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 agile-info-stat">
            <div class="stats-info stats-last widget-shadow">
                <h3 style="text-align: center">Movie Types</h3>
                <table class="table stats-table ">
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Song Types</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @if(isset($movieTypes))
                        @foreach($movieTypes as $type)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$type->name}}</td>

                            </tr>

                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

    <div class="w3-agileits-pane" style="margin-bottom: 5%">

        <div class="col-md-6 agile-info-stat">
            <div class="stats-info stats-last widget-shadow">
                <h3 style="text-align: center">Movies</h3>
                <table class="table stats-table ">
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Name</th>
                        <th>Language</th>
                        <th>Type</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @if(isset($movies))
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$movie->name}}</td>
                                <td>{{$movie->language}}</td>
                                <td>{{$movie->type}}</td>

                            </tr>

                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6 agile-info-stat">
            <div class="stats-info stats-last widget-shadow">
                <h3 style="text-align: center">Songs</h3>
                <table class="table stats-table ">
                    <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Name</th>
                        <th>Language</th>
                        <th>Type</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @if(isset($songs))
                        @foreach($songs as $song)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$song->name}}</td>
                                <td>{{$song->language}}</td>
                                <td>{{$song->type}}</td>

                            </tr>

                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>

    <!--//w3-agileits-pane-->
    <!-- script-for sticky-nav -->
    <script>
        $(document).ready(function() {
            var navoffeset=$(".header-main").offset().top;
            $(window).scroll(function(){
                var scrollpos=$(window).scrollTop();
                if(scrollpos >=navoffeset){
                    $(".header-main").addClass("fixed");
                }else{
                    $(".header-main").removeClass("fixed");
                }
            });

        });
    </script>
    <!-- /script-for sticky-nav -->
    <!--inner block start here-->
    <div class="inner-block">

    </div>
    <!--inner block end here-->
    <!--copy rights start here-->
    <!--COPY rights end here-->
@endsection
