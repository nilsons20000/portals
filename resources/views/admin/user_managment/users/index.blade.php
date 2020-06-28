@extends('admin.layouts.app_admin')

  @section('content')

  <div class="container sub-edit">

    @component('admin.components.breadcrumb')
      @slot('title') <h1>Lietotāju saraksts</h1> @endslot
      @slot('parent') Galvēna @endslot
      @slot('active') Lietotāji @endslot
    @endcomponent

    <hr>
    <a href="{{route('admin.user_managment.user.create')}}" class="btn  create-btn"><i class="fa fa-edit fa-edit-button"></i>  Izveidot lietotāju</a>

    <div class="section-ajax">
        @include('admin.user_managment.users.load')
    </div>

    @include('layouts.modal')
  @endsection
@include('cookieConsent::index')