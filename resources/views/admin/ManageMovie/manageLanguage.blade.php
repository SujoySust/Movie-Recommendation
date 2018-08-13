@extends('admin.master')
@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/movie/language/add')}}">Add New Languages</a> <i class="fa fa-angle-right"></i></li>
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
                        <th style="width: 20%">No</th>
                        <th style="width: 50%">Name</th>
                        <th style="width: 30%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            $i = 1;
                    ?>
                    @foreach($languages as $language)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$language->name}}</td>
                        <td>
                            <a href="{{url('admin/movie/language/edit').'/'.$language->id}}" class="btn btn-success">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a href="{{url('admin/movie/language/delete').'/'.$language->id}}" class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!-- //tables -->
    </div>
@endsection