<?php if($article->comment) { ?>
 @foreach($comment as $comments)
    <div class="display-comment">
         @if (isset($comments->user->name))
          <div class="user-login">{{ $comments->user->name }}
          </div>
        @elseif  (isset($comments->user->id))
          <div class="user-login">{{ $comments->user->id }}
          </div>
        @else
        <div class="user-login">Lietotājs izdzēsts
          </div>
        @endif
       <div class="comment-body"><p>{{ $comments->body }}</p></div>
        <a href="" id="reply"></a>
       
        <form method="post" action="{{ route('reply.add') }}">
           {{ csrf_field() }}
            <div class="form-item--with-scaling-label js-form-item form-item form-item-textfield">
               <label for="form-field-label" class="form-item__label font-weight-bold"> Pievieno atbildi.</label>
               <input class="form-text form-item__input" type="text" id="form-field-id" name="comment_body" value="" size="60" 
                        maxlength="128" >
                <input type="hidden" name="article_id" value="{{ $article->id }}" />
                <input type="hidden" name="comment_id" value="{{ $comments->id }}" />
            </div>
             <div class="form-group">
                <div class="button-add"> <span class="icon-Group-802"><span class="path1"></span><span class="path2"></span></span><input type="submit" class="btn-send-comment" value="ATBILDĒT" /> </div>
            </div>
        </form>
        <?php $user = Auth::user() ?>
          @if  ($user->role_id == 1)
          <form action="{{route('comment.destroy',$comments->id  )}}" method="post"  class="delete-form">
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit" class="btn"><i aria-hidden="true" class="fa fa-trash" style="margin-right: 10px"></i>IZDZĒST</button>
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
          </form>
           @endif
         @include('blog.partials._comment_replies', ['comment' =>$comments->replies])
    </div>
@endforeach

 <?php } else { ?>
    <h3 class="commet-container-headline">Komentāru nav</h3>
<?php } ?>



