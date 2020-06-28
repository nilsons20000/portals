@extends('layouts.app')
  @section('content')
  <div class="register-container-line center-block">
    <div class="container container-user-auth register-line">
      <div class="row">
        <div class="col-lg-4 col-lg-offset-2">
          <div class="error-container" style="margin-top: 20%;">
            <h3 class="error-title">Lapa netika atrasta!
            </h3>
            <p class="error-descript">Ir radusies tehniska kļūda, vai arī šī lapa nav pieejama.
            </p>
            <div class="form-group">
              <div class="button">
                <a href="{{ url('/') }}">
                  <button type="submit" class="btn save-btn">
                    ATPAKAĻ UZ SĀKUMU
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-6">
          <img src="{{URL::to('/images')}}/Erro404.png" alt="Register_image">
        </div>
      </div>
    </div>
  </div>
  @endsection
@include('cookieConsent::index')