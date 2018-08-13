@extends('admin.master')
@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/movie/actor/manage')}}">Mange Actor</a> <i class="fa fa-angle-right"></i></li>
    </ol>
    <div class="validation-system">
        <h3 style="text-align: center;color: #54A857;margin:2%">{{Session::get('message')}}</h3>
        <div class="validation-form">
            <!---->
            @foreach($actors as $actor)

                <form action="{{url('admin/movie/actor/update')}}" method="post">
                    {{csrf_field()}}
                    <div class="vali-form">
                        <div class="col-md-6 form-group1">
                            <label class="control-label form-group">Actor Name</label>
                            <input type="text" required="" name="name" value="{{$actor->name}}" class="form-group">
                            <input type="hidden" required="" name="id" value="{{$actor->id}}">
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 form-group1">
                            <label class="control-label form-group">Actor Country</label>
                            <select type="text" class="form-control2 form-group" name="countries">

                                <option value="{{$actor->countries}}">{{$actor->countries}}</option>
                                @foreach($languages as $language)
                                    <option value="{{$language->name}}">{{$language->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="clearfix"> </div>
                    </div>

                    <div class="col-md-12 form-group">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                    </div>
                    <div class="clearfix"> </div>
                </form>
        @endforeach

        <!---->
        </div>

    </div>
    <!--//grid-->
@endsection