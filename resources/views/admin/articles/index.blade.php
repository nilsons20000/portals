@extends('admin.layouts.app_admin')

@section('content')

<div class="container sub-edit">

  @component('admin.components.breadcrumb')
    @slot('title') <h1>Ziņu saraksts</h1> @endslot
    @slot('parent') Galvēna @endslot
    @slot('active') Ziņas @endslot
  @endcomponent

 <hr>

 <a href="{{route('admin.article.create')}}" class="btn create-btn"><i class="fa fa-edit fa-edit-button"></i>  Izveidot ziņu</a>

  <div class="section-ajax">
        @include('layouts.loader-ajax-admin.load_article_dashboard')
  </div>

</div>

@include('layouts.modal')

@endsection
@include('cookieConsent::index')


