@extends('admin.master')
@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/movie/manage')}}">Manage Movies</a> <i class="fa fa-angle-right"></i> <span style="text-align: center;color: green;">{{Session::get('message')}}</span></li>
    </ol>
    <div class="validation-system">

        <div class="validation-form">
            <!---->

            <form method="post" action="{{url('admin/movie/save')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Movie Title</label>
                        <input type="text" placeholder="Song Title" required="" name="name">
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Type</label>
                    <select type="text" name="type">
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
                    <input type="text" placeholder="Singer Name" required="" name="director">
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group2 group-mail">
                    <label class="control-label">Language</label>
                    <select type="text" name="language">
                        @if(isset($languages))
                            @foreach($languages as $language)
                                <option value="{{$language->name}}">{{$language->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Url</label>
                    <input type="text" placeholder="Movie Url" required="" name="link">
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 form-group1 group-mail">
                    <label class="control-label">Picture</label>
                    <input type="file" name="picture">
                </div>
                <div class="clearfix"> </div>

                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                </div>
                <div class="clearfix"> </div>
            </form>

            <!---->
        </div>

    </div>
    <!--//grid-->
    @endsection