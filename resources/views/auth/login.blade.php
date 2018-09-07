@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default" style="margin-top: 8%;">
                <div class="panel-heading">
                    <h3 class="panel-title">Please Sign In</h3>
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                       @csrf
                        <fieldset>
                            <div class="form-group">
                                <input id="email" placeholder="E-mail" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" style="color: #ff0000;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required value="">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                </label>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            <a class="btn btn-link" href="#">
                                 {{ __('Forgot Your Password?') }}
                             </a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
