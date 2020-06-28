@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

  @component('admin.components.breadcrumb')
    @slot('title') <h1> Kājiena  informāiju maiņa </h1> @endslot
    @slot('parent') Galvēna @endslot
    @slot('active') Kājiena  informāiju maiņa @endslot
  @endcomponent

  <hr />
  
  <form class="form-horizontal" action="{{route('admin.options.update', $options)}}" method="post" enctype="multipart/form-data" >
  <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}

    {{-- Form include --}}

    @include('admin.options.partials.form')

  </form>
</div>
<script type="application/javascript">  
  $( document ).ready(function() {
    CKEDITOR.replace( 'first_column' );
    CKEDITOR.replace( 'second_column' );
    CKEDITOR.replace( 'third_column' );
});
</script>
@endsection
@include('cookieConsent::index')