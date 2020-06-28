@extends('writer.layouts.app_writer')

@section('content')

@include('layouts.dashboard_block')

      <div class="col-lg-7">
        <div class="greeting-block">
          <div class="greeting-image">
            <img src="{{URL::to('/images')}}/Ilustracijas_ikona_sveiciens.png" alt="Ilustracijas_ikona_sveiciens">
          </div>
          <div class="greeting-text">
            <h1 class="greeting-title">Sveiki rakstnieks!</h1>
            <h2 class="greeting-description-short">Prieks redzēt {{ Auth::user()->name }} !</h2>
            <p class="greeting-description-long">Šeit jūs varat apskatīt, labot, ievietot sev vēlamo un redzēto, dalīties ar iegūto pieredzi un viedokli</p>
          </div>
        </div>

        <div class="create-button">
          <div class="title-container"><div class="hedline-title-block"><h2 class="headline-title">KATEGORIJAS</h2></div><div class="line">|</div></div>
            <a class="btn btn-block " href="{{route('writer.category.create')}}">Izveidot kategoriju</a>
            <div class="title-container"><div class="hedline-title-block"><h2 class="headline-title">RAKSTI</h2></div><div class="line">|</div></div>
            <a class="btn btn-block " href="{{route('writer.article.create')}}">Izveidot rakstu</a>
        </div>

      </div>
    </div>

  </div>

@endsection

@include('cookieConsent::index')