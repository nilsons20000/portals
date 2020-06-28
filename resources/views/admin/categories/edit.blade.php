@extends('admin.layouts.app_admin')

@section('content')

<div class="container sub-edit">

  @component('admin.components.breadcrumb')
    @slot('title') <h1>Rediģēt kategoriju</h1> @endslot
    @slot('parent') Galvēna @endslot
    @slot('active') Kategorijas @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('admin.category.update', $category)}}" method="post">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}

    {{-- Form include --}}
    @include('admin.categories.partials.form')

  </form>
</div>

@endsection
@include('cookieConsent::index')