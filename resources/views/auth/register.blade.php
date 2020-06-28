@extends('layouts.app')

@section('content')

<div class="register-container-line center-block">
    <div class="container container-user-auth register-line">
        <div class="row">
            <div class="col-lg-6">
                 <img src="{{URL::to('/images')}}/Group_register.png" alt="Register_image" class="register_image">
            </div>
            <div class=" col-lg-4 col-lg-offset-1 ">
                    <div class="panel panel-default">
                    <div class="panel-heading"><h6>RĒĢISTRĒJIES</h6></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="control-label">Lietotājvārds</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">Ēpasts</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
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
                                <label for="password-confirm" class="control-label">Atkartota parole</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                            <div class="form-group">
                                <div class="button">
                                    <button type="submit" class="btn save-btn">
                                        PIEREĢISTRĒTIES
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
