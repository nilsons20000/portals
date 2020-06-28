@extends('layouts.app')

@section('content')


<div class="container sub-edit">



  <hr />


  @if(session()->has('message'))

   <div class="create-button" style="margin-top: 30px">
    <div class="alert alert-success success-send-article">
          {{ session()->get('message') }}
          <a class="btn btn-block link-home" href="{{URL::to('/home')}}">Personīgais kabinets</a>
        </div>
    </div>

  @endif



  <form class="form-horizontal" action="{{route('update', $article)}}" method="post" enctype="multipart/form-data" style="display: flex;justify-content: center;flex-direction: column;">
    
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}

    {{-- Form include --}}
    
    <img src="{{URL::to('/images').'/'.$article->image_path}}" alt="">

   @include('partials.form')
    
    <input type="hidden" name="modified_by" value="{{Auth::id()}}">
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