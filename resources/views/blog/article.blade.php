@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
</script>
@section('title', $article->meta_title)
@section('meta_keyword', $article->meta_keyword)
@section('meta_description', $article->meta_description)
@section('content')

<div class="container single-article">
    <div class="row">
        <div class="col-sm-12">

            <?php if (!empty($article->image_path)){ ?>
                <img class="news-image" src="{{URL::to('/images').'/'.$article->image_path}}"  alt="ikdiena_article_image">
                <?php } else { ?>
               <img class="news-image" src="/images/image-not-found.png" alt="ikdien_image_not_found">
            <?php }?>
            
            <div class="news-detal-long">
                <h3  class="news-title">{{$article->title}}</h3>
                @if($article->created_at)
                    <div class="display-date">
                    {{$article->created_at->format('d.m.Y') }}
                    </div>
                @endif
                <div class="description_short">
                <p >{!!$article->description_short!!}</p></div>
            </div>
              <div class="share">
                <!-- <div class="wrap-share">
                    <a class="share-btn-fb" href="http://www.facebook.com/sharer/sharer.php?s=100&p%5Btitle%5D=<?php  echo $article->title ?> &p%5Bsummary%5D={{$article->title}}&p%5Burl%5D=<?php url() ?>&p%5Bimages%5D%5B0%5D=[IMAGE]" target="_blank" onclick="return Share.me(this);">
                        <div class="facebook share-block">
                            <span class="icon-facebook"></span>
                        </div>
                    </a>
                </div> -->
                <div class="wrap-share">
                    <a class="share-btn-in" href="https://www.linkedin.com/cws/share?url=<?php url() ?>" target="_blank" onclick="return Share.me(this);">
                        <div class="linkedin share-block">
                           <span class="icon-linkedin2"></span>
                        </div>
                    </a>
                </div>
                <div class="wrap-share">
                <a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Ffiddle.jshell.net%2F_display%2F&text={{$article->title}}&url=<?php url() ?>" target="_blank" onclick="return Share.me(this)">
                        <div class="twitter share-block">
                            <span class="icon-twitter"></span>
                        </div>
                    </a>
                </div>
                <div class="wrap-share">
                    <a href="https://api.whatsapp.com/send?text={{$article->title}} <?php url() ?> "  target="_blank">
                        <div class="whatsapp share-block">
                            <span class="icon-whatsapp"></span>
                        </div>
                    </a>


                </div>

                </div> 

            <?php if($user = Auth::user()){ ?>    
                <div class="post" data-postid="{{ $article->id }}">
                    <div class="interaction">
                        <a href="#" class="btn btn-xs btn-warning like like-true">{{ Auth::user()->likes()->where('post_id', $article->id)->first() ? Auth::user()->likes()->where('post_id', $article->id)->first()->like == 1 ? 'Jūms patika šīs raksts' : 'Patīk' : 'Patīk'  }}</a>
                    </div>
                </div>
             <?php } else { ?>
                <h4 class="comment-warning">Lai atzīmet rakstu, Jūms ir jāpiereģistrējas</h4>
            <?php } ?>

            <div class="description-long">
                {!!$article->description!!}
            </div>

            <div class="article-counter-block">
                <span class="article-counter-text">Rakstu noskatījas:</span><span class="article-count">{!!$article->viewed!!}</span>
            </div>

        </div>
    </div>

  <?php if($user = Auth::user()){ ?>
        <div class="title-container">
            <div class="hedline-title-block"><h2 class="headline-title">KOMENTĀRI</h2></div><div class="line">|</div>
        </div>
        <div class="container-comment">
             <form method="post" class="form-add-comment" action="{{ route('comment.add') }}">
                     {{ csrf_field() }}
                <div class="form-item--with-scaling-label js-form-item form-item form-item-textfield">
                    <label for="form-field-label" class="form-item__label font-weight-bold"> Pievieno komentāru.</label>
                    <input class="form-text form-item__input" type="text" id="form-field-id" name="comment_body" value="" size="60" 
                    maxlength="128">
                    <input type="hidden" name="article_id" value="{{ $article->id }}" />
                </div>
                <div class="form-group">
                    <div class="button-add button-add-comment"> <span class="icon-Group-802 icon-add"><span class="path1"></span><span class="path2"></span></span> <button type="submit" id="send_form" class="btn-send-comment">PIEVIENOT</button> </div>
                </div>
            </form>
            @include('blog.partials._comment_replies', ['comment' => $article->comment, 'article_id' => $article->id])
        </div>

    <?php } else { ?>
        <h4 class="comment-warning">Lai atstāt komentāru, Jūms vajag autorizēties</h4>
    <?php } ?>

    @if (session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
    @endif
</div> 
@endsection


<script>
var token = '{{ Session::token() }}';
var urlLike = '{{ route('like') }}';
var postId = 0;
    $(document).on('click','.like',function(event){
        event.preventDefault();
        postId = event.target.parentNode.parentNode.dataset['postid'];
        var isLike = event.target.previousElementSibling == null;
        $.ajax({
            method: 'POST',
            url: urlLike,
            data: {isLike: isLike, postId: postId, _token: token},
        })
        .done(function() {
          event.target.innerText = isLike ? event.target.innerText == 'Patīk' ? 'Jūms patika šīs raksts' : 'Patīk' : event.target.innerText == 'Dislike' ? 'You dont like this post' : 'Dislike';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Patīk';
            }
        });
    });
</script>