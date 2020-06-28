@extends('admin.layouts.app_admin')

@section('content')

<div class="container sub-edit">

  @component('admin.components.breadcrumb')
    @slot('title') <h1>Lietotāja izveide</h1> @endslot
    @slot('parent') Galvēna @endslot
    @slot('active') Lietotāji @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('admin.user_managment.user.store')}}" method="post">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.user_managment.users.partials.form')

  </form>
</div>

@endsection
@include('cookieConsent::index')