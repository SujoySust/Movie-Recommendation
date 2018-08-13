@extends('admin.master')
@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/movie/actor/add')}}">Add New Actor</a> <i class="fa fa-angle-right"></i></li>
        <li class="breadcrumb-item"><a href="{{url('admin/movie/actor/manage')}}">All Actors</a> <i class="fa fa-angle-right"></i></li>
    </ol>
    <div class="clearfix"></div>
    <div class="form-group">
        <form class="form-group" method="post" action="{{url('admin/movie/actor/search')}}">
            {{csrf_field()}}
            <div class="col-md-6">
                <select class="form-control2" name="countries">
                    @if($country)
                        <option value="{{$country}}">{{$country}}</option>
                    @endif
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
                    @if(isset($actorBycountries))
                    <?php
                    $i = 1;
                    ?>
                    @foreach($actorBycountries as $actorBycounty)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$actorBycounty->name}}</td>
                            <td>{{$actorBycounty->countries}}</td>
                            <td>
                                <a href="{{url('admin/movie/actor/edit').'/'.$actorBycounty->id}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{url('admin/movie/actor/delete').'/'.$actorBycounty->id}}" class="btn btn-danger">
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