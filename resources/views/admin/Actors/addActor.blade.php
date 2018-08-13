@extends('admin.master')
@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/movie/actor/manage')}}">Manage Actor</a> <i class="fa fa-angle-right"></i></li>
    </ol>
    <div class="validation-system">
        <h3 style="text-align: center;color: #54A857;margin:2%">{{Session::get('message')}}</h3>
        <div class="validation-form">
            <!---->

            <form action="{{url('admin/movie/actor/save')}}" method="post">
                {{csrf_field()}}
                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Actor Name</label>
                        <input type="text" placeholder="Name" required="" name="name" class="form-group">
                    </div>
                    <div class="clearfix"> </div>
                    <div class="col-md-6 form-group2">
                        <label class="control-label">Language</label>
                        <select type="text" name="countries" class="form-group" style="width: 100%">
                            @if(isset($languages))
                                @foreach($languages as $language)
                            <option value="{{$language->name}}">{{$language->name}}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                </div>

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