@extends('writer.layouts.app_writer')

@section('content')

<div class="container" >

  @component('writer.components.breadcrumb')
    @slot('title') <h1>Ziņu rediģēšana</h1> @endslot
    @slot('parent') Galvēna @endslot
    @slot('active') Ziņas @endslot
  @endcomponent

  <hr />

  <form class="form-horizontal" action="{{route('writer.article.update', $article)}}" method="post" enctype="multipart/form-data" style="display: flex;justify-content: center;flex-direction: column;">
    <input type="hidden" name="_method" value="put">
    {{ csrf_field() }}
    {{-- Form include --}}

    <img src="{{URL::to('/images').'/'.$article->image_path}}" alt="">

    @include('writer.articles.partials.form')
    
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
