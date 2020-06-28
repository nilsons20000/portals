@extends('admin.layouts.app_admin')

@section('content')

<div class="container sub-edit">

  @component('admin.components.breadcrumb')
    @slot('title') <h1>Rediģēt lietotāju</h1> @endslot
    @slot('parent') Galvēna @endslot
    @slot('active') Lietotāji @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('admin.user_managment.user.update', $user)}}" method="post">
    {{ method_field('PUT')}}
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.user_managment.users.partials.form')

  </form>
</div>

@endsection
@include('cookieConsent::index')