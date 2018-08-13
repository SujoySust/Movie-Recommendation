@extends('admin.layout.auth')

@section('content')
    <div class="main-wthree">
        <div class="container">
            <div class="sin-w3-agile">
                <h2>Sign In</h2>
                @if ($errors->has('email'))
                    <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                <form action="{{url('/admin/login')}}" method="post">
                     {{ csrf_field()}}
                    <div class="username">
                        <span class="username">Email</span>
                        <input type="email" name="email" class="name" placeholder="" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="password-agileits">
                        <span class="username">Password:</span>
                        <input type="password" name="password" class="password" placeholder="" required="">
                        <div class="clearfix"></div>
                    </div>
                    <div class="rem-for-agile">
                        <input type="checkbox" name="remember" class="remember">Remember me<br>
                        <a href="{{ url('/user/password/reset') }}">Forgot Password</a><br>
                    </div>
                    <div class="login-w3">
                        <input type="submit" class="login" value="Sign In">
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
