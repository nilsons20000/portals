@extends('layouts.app')
@section('content')
<div class="register-container-line">
  <div class="container container-user-auth register-line">
    <div class="row">
      <div class="col-lg-6">
        <img src="{{URL::to('/images')}}/Ilustracija_apsveic.png" alt="sucess_image">
      </div>
      <div class=" col-lg-4 col-lg-offset-2 ">
        <div class="container-succestfull-descript">
          <h3>Apsveicam!
          </h3>
          <p>Esi veiksmīgi piereģistrējies!
          </p>
          <p>Nosūtīsim apstiprinājumu jums uz e-pastu!
          </p>
          <p>{{ __('Apstiprini savu epastu') }}
          </p>
          @if (session('resent'))
          <div class="alert alert-success" role="alert">
            <p>{{ __('Uz jūsu e-pasta adresi ir nosūtīta jauna verifikācijas saite.') }}
            <p>
          </div>
          @endif
          <p>{{ __('Pirms turpināt, lūdzu, pārbaudiet savā e-pastā verifikācijas saiti.') }}
          <p>
          <p> {{ __('Ja nesaņēmāt e-pastu') }}, 
            <a href="{{ route('verification.resend') }}">{{ __('noklikšķiniet šeit, lai pieprasītu citu') }}
            </a>.
          <p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@include('cookieConsent::index')
