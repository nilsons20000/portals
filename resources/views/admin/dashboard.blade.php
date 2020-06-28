@extends('admin.layouts.app_admin')

@section('content')

@include('layouts.dashboard_block')

      <div class="col-lg-7 col-md-7">
        <div class="greeting-block">
          <div class="greeting-image">
            <img src="{{URL::to('/images')}}/Ilustracijas_ikona_sveiciens.png" alt="Ilustracijas_ikona_sveiciens">
          </div>
          <div class="greeting-text">
            <h1 class="greeting-title">Sveiki!</h1>
            <h2 class="greeting-description-short">Prieks redzēt {{ Auth::user()->name }}!</h2>
            <p class="greeting-description-long">Šeit jūs varat apskatīt, labot, ievietot sev vēlamo un redzēto, dalīties ar iegūto pieredzi un viedokli</p>
          </div>
        </div>

        <div class="create-button">
          <div class="title-container"><div class="hedline-title-block"><h2 class="headline-title">KATEGORIJAS</h2></div><div class="line">|</div></div>
            <a class="btn btn-block " href="{{route('admin.category.create')}}">Izveidot kategoriju</a>
            <div class="title-container"><div class="hedline-title-block"><h2 class="headline-title">RAKSTI</h2></div><div class="line">|</div></div>
            <a class="btn btn-block " href="{{route('admin.article.create')}}">Izveidot rakstu</a>

            <div class="title-container"><div class="hedline-title-block"><h2 class="headline-title">LIETOTĀJI</h2></div><div class="line">|</div></div>
            <a class="btn btn-block " href="{{route('admin.user_managment.user.create')}}">Izveidot Lietotājus</a>

            <div class="title-container"><div class="hedline-title-block"><h2 class="headline-title">Opcijas</h2></div><div class="line">|</div></div>
            <a class="btn btn-block " href="{{route('admin.options.index')}}">Opcijas</a>
        </div>

      </div>
    </div>
  </div>

@endsection

