@extends('layouts.app')

@section('content')

<div class="container">

  <hr />

  @if(session()->has('message'))

   <div class="create-button" style="margin-top: 30px">
		<div class="alert alert-success success-send-article">
	        {{ session()->get('message') }}
	        <a class="btn btn-block link-home" href="{{URL::to('/home')}}">Personīgais kabinets</a>
	    	</div>
    </div>

    
   @endif


  <form class="form-horizontal" action="{{route('articleSugg.add')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}

    {{-- Form include --}}

    @include('partials.form')

    <input type="hidden" name="created_by" value="{{Auth::id()}}">
  </form>


</div>
<script type="application/javascript">  


$( document ).ready(function() {
  CKEDITOR.replace( 'description_short' );
  CKEDITOR.replace( 'description' );
});
</script>
@endsection
@include('cookieConsent::index')