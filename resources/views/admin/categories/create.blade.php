@extends('admin.layouts.app_admin')

@section('content')

<div class="container sub-edit">

  @component('admin.components.breadcrumb')
    @slot('title') <h1>Izveidot kategoriju</h1> @endslot
    @slot('parent') Galvēna @endslot
    @slot('active') Kategorijas @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('admin.category.store')}}" method="post">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.categories.partials.form')
    
  </form>
</div>

@endsection
@include('cookieConsent::index')