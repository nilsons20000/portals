@extends('admin.layouts.app_admin')

@section('content')

<div class="container sub-edit">

  @component('admin.components.breadcrumb')
    @slot('title') <h1> Ziņu izveidošana </h1> @endslot
    @slot('parent') Galvēna @endslot
    @slot('active') Ziņas @endslot
  @endcomponent

  <hr />


  @if(session()->has('message'))

   <div class="create-button" style="margin-top: 30px">
    <div class="alert alert-success success-send-article">
          {{ session()->get('message') }}
          <a class="btn btn-block link-home" href="{{URL::to('/admin')}}">Personīgais kabinets</a>
        </div>
    </div>

  @endif





  <form class="form-horizontal" action="{{route('admin.article.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    {{-- Form include --}}

    @include('admin.articles.partials.form')

    <input type="hidden" name="created_by" value="{{Auth::id()}}">
  </form>
</div>
<script type="application/javascript">  
jQuery( document ).ready(function() {
  CKEDITOR.replace( 'description_short' );
  CKEDITOR.replace( 'description' );
});
</script>
@endsection
@include('cookieConsent::index')