@extends('admin.master')
@section('mainContent')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{url('admin/type/manage')}}">Mange Types</a> <i class="fa fa-angle-right"></i></li>
    </ol>
    <div class="validation-system">
        <h3 style="text-align: center;color: #54A857;margin:2%">{{Session::get('message')}}</h3>
        <div class="validation-form">
            <!---->
            @foreach($types as $type)

            <form action="{{url('admin/type/update')}}" method="post">
                {{csrf_field()}}
                <div class="vali-form">
                    <div class="col-md-6 form-group1">
                        <label class="control-label">Type</label>
                        <input type="text" required="" name="type" value="{{$type->type}}">
                        <input type="hidden" required="" name="id" value="{{$type->id}}">
                    </div>
                    <div class="clearfix"> </div>
                </div>

                <div class="col-md-12 form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
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