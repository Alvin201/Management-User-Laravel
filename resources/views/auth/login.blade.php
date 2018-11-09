@extends('layouts.login')

@section('content')
<div id="login">

        <h1>Please login.</h1>

        <form  role="form" method="POST" action="{{ url('/login') }}">
            {{ csrf_field() }}
            <fieldset>
                <p><input type="text" placeholder="Username or Email" required="" name="usernameoremail"></p> 
                
                 @if ($errors->has('username'))
                <span class="help-block">
                <strong style="font-size: 12px;">{{ $errors->first('username') }}</strong>
                </span>
                @endif


                <p><input id="password" type="password" placeholder="Password" name="password" required></p> 
                 @if ($errors->has('password'))
                <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

               <div class="form-group">
                    <label for="remember"><input type="checkbox" name="remember" id="remember"> Remember Me</label>          
                </div>
                
                <p><input type="submit" value="Login" style="width: 92%;"></p>
            </fieldset>
        </form>
        
        <!-- <a class="hvr-shutter-in-horizontal" href="{{ url('/password/reset') }}">Forgot Your Password?</a> -->

        <!-- <p><span class="btn-round">or</span></p>
        <p>
            <a class="facebook-before"><span class="fontawesome-facebook"></span></a>
            <button class="facebook">Login Using Facbook</button>
        </p>

        <p>
            <a class="twitter-before"><span class="fontawesome-twitter"></span></a>
            <button class="twitter">Login Using Twitter</button>
        </p> -->

    </div> <!-- end login -->
@endsection
