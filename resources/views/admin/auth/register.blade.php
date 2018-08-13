@extends('admin.layout.auth')

@section('content')
    <div class="main-wthree">
        <div class="container">
            <div class="sin-w3-agile">
                <h2>Sign Up</h2>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
                <form action="{{url('/admin/register')}}" method="post">
                    {{csrf_field()}}
                    <div class="username">
                        <span class="username">Username:</span>
                        <input type="text" name="name" class="name" placeholder="" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="username">
                        <span class="username">Email:</span>
                        <input type="email" name="email" class="name" placeholder="" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="password-agileits">
                        <span class="username">Password:</span>
                        <input type="password" name="password" class="password" placeholder="" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="password-agileits">
                        <span class="username">Confirm Password:</span>
                        <input type="password" name="password_confirmation" class="password" placeholder="" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="login-w3">
                        <input type="submit" class="login" value="Sign Up">
                    </div>
                    <div class="clearfix"></div>
                </form>
                <div class="back">
                    <a href="index.html">Back to home</a>
                </div>
            </div>
        </div>
    </div>
@endsection
