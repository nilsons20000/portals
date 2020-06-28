@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
</script>
@section('content')
<div class="container">
  <div class="row news-small-row" id="load-data">
    @php
    $i = 0
    @endphp
    @foreach($post_data as $post_val)
      <div class="col-sm-6 col-md-6 col-lg-6">
        <div class="news-container-small">
          <a href="{{route('article', $post_val->slug)}}" target="_blank">
            <div class="small-news_container_descript">

              <?php if (!empty($post_val->image_path)){ ?>
              <img class="news-image" src="{{URL::to('/images').'/'.$post_val->image_path}}" alt="ikdiena_article_image">
              <?php } else { ?>
              <img class="news-image" src="/images/image-not-found.png" alt="ikdien_image_not_found">
              <?php }?>

              <div class="news-detal">
                <h6  class="news-title">{{$post_val->title}}<span class="tooltiptext"><?php echo 
                    $post_val->title ?></span></h6>
                </h6>
                <div class="detal-info">
                  @if($post_val->categories)
                    @foreach($post_val->categories as $category)
                    <div class="display-category">
                      <strong>{{ $category->title }}
                      </strong>
                    </div>
                    @endforeach
                  @endif
                  @if($post_val->created_at)
                  <div class="display-date">
                    {{$post_val->created_at->format('d.m.Y') }}
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </a>
        </div>
      </div>
    @endforeach
    <div id="remove-row">
      <div class="row-button">
        <button id="btn-more" data-id="{{ $post_val->id }}" class="btn-more btn-block" > Ieladēt vel 
        </button>
      </div>
    </div>
  </div>    
</div>
@stop
@section('scripts')
<script>     
  $(document).ready(function(){
    //alert('dsfdsf'); // call function on #btn-more
    $(document).on('click','#btn-more',function(event){
      event.preventDefault();
      // set id value  
      var id = $(this).data('id');
      // show lode 
      $("#btn-more").html("Ielade...");
      // call ajax with post method
      $.ajax({
        method : "POST",     
        url : '{{ route("blog.all_article") }}',           
        data : {
          "id":id, "_token":"{{ csrf_token() }}"}
        ,
        dataType : "text",
        cache: false,
        success: function(data){
          console.log('success');
          result = data;
          if(data != '') {
            $('#remove-row').remove();
             $('#load-data').append(data);
          }
          else
          {
            $('#btn-more').html("Rakstu nav");
          }
        }
      });
    });
  });
</script>
@include('cookieConsent::index')