@extends('layouts.app')

@section('content')

<div class="register-container-line center-block">
    <div class="container container-user-auth  register-line">
        <div class="row">
             <div class="col-lg-6">
                 <img src="{{URL::to('/images')}}/Group_login.png" alt="Authorization_image" class="authorization_image">
            </div>
            <div class="col-lg-4 col-lg-offset-1">
                <div class="panel panel-default">
                   <div class="panel-heading"><h6>PIERAKSTĪTIES</h6></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">Ē-pasts</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Parole</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn save-btn">
                                    Login
                                </button>
                            </div>
                            <div class="form-group remember-block">
                                 <div class="checkbox">
                                    <label class="container-label">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> <span class="checkbox-text">Atcerēties mani</span>
                                         <span class="checkmark"></span>
                                    </label>
                                </div>
                                <a class=" remember-pass" href="{{ route('password.request') }}">
                                    Aizmirsi Paroli?
                                </a>
                            </div>
                        </form>
                        <div class="form-group row mb-0">
                            <a href="{{ url('/auth/redirect/facebook') }}" class="btn facebook-login-button">Facebook</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
