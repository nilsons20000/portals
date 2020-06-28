@extends('layouts.app')

@section('content')

<div class="register-container-line">
    <div class="container container-user-auth register-line">
        <div class="row">
            <div class="col-lg-6">
                 <img src="{{URL::to('/images')}}/reset_pass.png" alt="Register_image" class="register_image">
            </div>
            <div class=" col-lg-4 col-lg-offset-1 ">
                    <div class="panel panel-default">
                    <div class="panel-heading"><h6>ATJAUNOT PAROLI</h6></div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            {{ csrf_field() }}
                            
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group">
                                <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">{{ __('Parole') }}</label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="control-label">{{ __('Apstiprināt paroli') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>

                            <div class="form-group">
                                <div class="button">
                                    <button type="submit" class="btn save-btn">
                                       {{ __('ATJAUNOT PAROLI') }}
                                    </button>
                                </div>
                            </div>
                            <div class="registration-user"><p>Esi jau reģistrējies?  <a href="{{ route('login') }}"><span class="body-text">    IENĀKT</span> </a></p></div> 
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection






