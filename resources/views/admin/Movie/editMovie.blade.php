@extends('admin.master')
@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/movie/manage')}}">Manage Movies</a> <i class="fa fa-angle-right"></i> <span style="text-align: center;color: green;">{{Session::get('message')}}</span></li>
    </ol>
    @if(isset($movies))
        @foreach($movies as $movie)
    <div class="validation-system col-md-6">


        <div class="validation-form">
            <!---->
               <h2 style="text-align:center">Update Movie</h2>
            <form method="post" action="{{url('admin/movie/update')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="vali-form">
                    <div class="col-md-12 form-group1">
                        <label class="control-label">Movie Title</label>
                        <input type="text" value="{{$movie->name}}" required="" name="name">
                        <input type="hidden" name="id" value="{{$movie->id}}">

                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Type</label>
                    <select type="text" name="type">
                        <option value="{{$movie->type}}">{{$movie->type}}</option>
                        @if(isset($types))
                        @foreach($types as $type)
                        <option value="{{$type->name}}">{{$type->name}}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Director Name </label>
                    <input type="text" value="{{$movie->director}}" required="" name="director">
                </div>
                <div class="clearfix"> </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Language</label>
                    <select type="text" name="language">
                        <option value="{{$movie->language}}">{{$movie->language}}</option>
                        @if(isset($languages))
                            @foreach($languages as $language)
                                <option value="{{$language->name}}">{{$language->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Url</label>
                    <input type="text" value="{{$movie->link}}" required="" name="link">
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Picture</label>
                    <img src="{{asset($movie->picture)}}" style="width: 300px" class="form-group">
                    <input type="file" name="picture" class="form-group">
                </div>
                <div class="clearfix"> </div>

                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
                <div class="clearfix"> </div>
            </form>

            <!---->
        </div>


    </div>

    <div class="validation-system col-md-6">


                <div class="validation-form">
                    <!---->

                    <form method="post" action="{{url('admin/movie/addActor')}}" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="col-md-12 form-group1">
                            <input type="hidden" name="id" value="{{$movie->id}}">
                        </div>
                        <div class="clearfix"> </div>

                        <div class="col-md-12 form-group2 group-mail">
                            <label class="control-label">Add New Actor Name</label>
                            <select type="text" name="actorId">
                                @if(isset($actorLists))
                                    @foreach($actorLists as $actorList)
                                        <option value="{{$actorList->id}}">{{$actorList->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="clearfix"> </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-primary">Add Actor Name</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                        <div class="clearfix"> </div>
                    </form>

                    <!---->
                </div>


    </div>
    <div class="col-md-6">
        <h3 style="text-align: center;color: #54A857;margin:2%">{{Session::get('message')}}</h3>

        <div class="agile-tables">
            <div class="w3l-table-info">
                <h3>Actor Lists</h3>
                <table id="table">
                    <thead>
                    <tr>
                        <th style="width: 10%">No</th>
                        <th style="width: 40%">Name</th>
                        <th style="width: 30%">Countries</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($movieActorLists))
                        <?php
                        $i = 1;
                        ?>
                        @foreach($movieActorLists as $movieActorList)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$movieActorList->name}}</td>
                                <td>{{$movieActorList->countries}}</td>
                                <td>
                                    <a href="{{url('admin/movie/deleteActor').'/'.$movieActorList->id.'/'.$movie->id}}" class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>

                        @endforeach
                    @endif

                    </tbody>
                </table>
            </div>

        </div>

    </div>

     @endforeach
    @endif
    <!--//grid-->
    @endsection