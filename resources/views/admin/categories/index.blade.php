@extends('admin.layouts.app_admin')

@section('content')

<div class="container sub-edit">

  @component('admin.components.breadcrumb')
    @slot('title') <h1>Kategoriju saraksts</h1> @endslot
    @slot('parent') Galvēna @endslot
    @slot('active') Kategorijas @endslot
  @endcomponent

 <hr>

 <a href="{{route('admin.category.create')}}" class="btn  create-btn"><i class="fa fa-edit fa-edit-button"></i>  Izveidot kategoriju</a>

  <div class="section-ajax">
        @include('layouts.loader-ajax-admin.load_category_admin_dashboard')
  </div>

</div>

@include('layouts.modal')

@endsection
@include('cookieConsent::index')

