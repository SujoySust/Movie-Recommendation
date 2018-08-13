@extends('admin.master')
@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/movie/actor/add')}}">Add New Actor</a> <i class="fa fa-angle-right"></i></li>


    </ol>
    <div class="clearfix"></div>
    <div class="form-group">
        <form class="form-group" method="post" action="{{url('admin/movie/actor/search')}}">
            {{csrf_field()}}
            <div class="col-md-6">
                <select class="form-control2" name="countries">
                    <option>Search Actor By Countries</option>
                    @if(isset($languages))
                        @foreach($languages as $language)
                    <option value="{{$language->name}}">{{$language->name}}</option>
                        @endforeach
                    @endif
                </select>

            </div>
            <div class="col-md-4">
                <input type="submit" class="btn btn-success" value="Search">
            </div>

        </form>
    </div>
    <div class="agile-grids">


        <div class="clearfix"></div>
        <!-- tables -->
        <h3 style="text-align: center;color: #54A857;margin:2%">{{Session::get('message')}}</h3>

        <div class="agile-tables">
            <div class="w3l-table-info">
                <h2>Manage Actors</h2>
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
                    @if(isset($actors))
                    <?php
                    $i = 1;
                    ?>
                    @foreach($actors as $actor)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$actor->name}}</td>
                            <td>{{$actor->countries}}</td>
                            <td>
                                <a href="{{url('admin/movie/actor/edit').'/'.$actor->id}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{url('admin/movie/actor/delete').'/'.$actor->id}}" class="btn btn-danger">
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
        <!-- //tables -->
    </div>
@endsection