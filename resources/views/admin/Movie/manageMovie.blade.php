@extends('admin.master')
@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/language/add')}}">Add New Songs</a> <i class="fa fa-angle-right"></i></li>
    </ol>
    <div class="agile-grids">
        <!-- tables -->
        <h3 style="text-align: center;color: #54A857;margin:2%">{{Session::get('message')}}</h3>

        <div class="agile-tables">
            <div class="w3l-table-info">
                <h2>Manage Language</h2>
                <table id="table">
                    <thead>
                    <tr>
                        <th style="width: 5%">No</th>
                        <th style="width: 30%">Name</th>
                        <th style="width: 15%">Type</th>
                        <th style="width: 20%">Director</th>
                        <th style="width: 10%">Language</th>
                        <th style="width: 15%">Action</th>
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
                            <td>{{$movie->type}}</td>
                            <td>{{$movie->director}}</td>
                            <td>{{$movie->language}}</td>
                            <td>
                                <a href="{{url('admin/movie/edit').'/'.$movie->id}}" class="btn btn-success">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{url('admin/movie/delete').'/'.$movie->id}}" class="btn btn-danger">
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