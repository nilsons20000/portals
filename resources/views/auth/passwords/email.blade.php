@extends('layouts.app')

@section('content')

<div class="register-container-line">
    <div class="container container-user-auth  register-line">
        <div class="row">
             <div class="col-lg-6">
                 <img src="{{URL::to('/images')}}/pass_image.png" alt="resset_pass_image" class="resset_pass_image" >
            </div>
            <div class="col-lg-4 col-lg-offset-1">
                <div class="panel panel-default" style="margin-top: 150px;">
                   <div class="panel-heading"><h6>Atjaunot paroli</h6></div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">Ē-pasts</label>
                                   <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                   @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn save-btn">
                                    {{ __('Atsūtīt paroli') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
