<?php
$user=Auth::user();
foreach($user->roles as $role){
if($role->name == 'admin'){ ?>
<span class="icon-forward-1">
</span>
<div class="container dashboard">
  <div class="row">
    <div class="col-lg-4 col-md-4">
      <div class="collapsible block_first block-style">
          <span class="icon-cat"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>
        <p>
          <span class="label">Kategorijas 
          </span> 
          <span class="label-number">{{$count_categories}}
          </span>
        </p>
      </div>
      <div class="collapsible_content">
        <div class="more-link"> 
          <a  href="{{route('admin.category.create')}}"  class="list-group-item list-group-more">
            <span>Izveidot kategoriju
            </span>
            <i class="fa fa-arrow-right">
            </i>
          </a>
        </div> 
        <?php $i=0 ?>
        @foreach ($categories as $category)
        <?php if ($i>3) { ?> 
        <div class="more-link"> 
          <a href="{{route('admin.category.index')}}" class="list-group-item list-group-more">
            <span>Skatīties vairāk
            </span>
            <i class="fa fa-arrow-right">
            </i> 
          </a>
        </div>
        @break
        <?php  } ?>
        <?php if ($i==5) { ?>
        <a class="list-group-item" href="{{route('admin.category.edit', $category)}}">
          <span class="collapsible_title">{{$category->title}}
          </span>
          <p class="list-group-item-text">
            {{$category->articles()->count()}}
          </p>
        </a>
        <div class="more-link"> 
          <a href="{{route('admin.category.index')}}" class="list-group-item list-group-more">
            <span>Skatīties vairāk
            </span>
            <i class="fa fa-arrow-right">
            </i> 
          </a>
        </div>
        <?php } if($i<5){ ?>
        <a class="list-group-item" href="{{route('admin.category.edit', $category)}}">
          <span class="collapsible_title">{{$category->title}}
          </span>
          <p class="list-group-item-text">
            {{$category->articles()->count()}}
          </p>
        </a>

        <?php } $i++;?>
        @endforeach

      </div>



      <div class="collapsible block_second block-style accordion">
        <span class="icon-raks"></span>
        <p>
          <span class="label">Raksti 
          </span>  
          <span class="label-number"> {{$count_articles}}
          </span>
        </p>
      </div>
      <div class="collapsible_content">
        <div class="more-link"> 
          <a  href="{{route('admin.article.create')}}"  class="list-group-item list-group-more">
            <span>Izveidot rakstu
            </span>
            <i class="fa fa-arrow-right">
            </i>
          </a>
        </div> 
        <?php $i=0 ?>
        @foreach ($articles as $article)

        <?php if ($i==5) { ?>
        <a class="list-group-item" href="{{route('admin.article.edit', $article)}}">
          <span class="collapsible_title">{{$article->title}}
          </span>
          <p class="list-group-item-text">
            {{$article->categories()->pluck('title')->implode(', ')}}
          </p>
        </a>
        <?php } else if($i<5 || $i>3 ){ ?>
        <a class="list-group-item" href="{{route('admin.article.edit', $article)}}">
          <span class="collapsible_title">{{$article->title}}
          </span>
          <p class="list-group-item-text">
            {{$article->categories()->pluck('title')->implode(', ')}}
          </p>
        </a>
         <div class="more-link"> 
          <a href="{{route('admin.article.index')}}" class="list-group-item list-group-more">
            <span>Skatīties vairāk
            </span>
            <i class="fa fa-arrow-right">
            </i>
          </a>
        </div> 
        <?php } $i++;?>
        @endforeach
      </div>

      <div class="collapsible block_third block-style accordion">
        <span class="icon-users"><span class="path1"></span><span class="path2"></span><span class="path3"></span></span>
        <p>
          <span class="label">Lietotāji 
          </span>
          <span class="label-number"> {{$count_users}}
          </span>
        </p>
      </div>

      <div class="collapsible_content">
        <div class="more-link"> 
          <a  href="{{route('admin.user_managment.user.index')}}"  class="list-group-item list-group-more">
            <span>Izveidot lietotaju
            </span>
            <i class="fa fa-arrow-right">
            </i>
          </a>
        </div>
        <?php $i=0 ?>
        @foreach ($users as $user)
        <?php if ($i>3) { ?> 
        <div class="more-link">
          <a  href="{{route('admin.user_managment.user.index')}}"  class="list-group-item list-group-more">
            <span>Skatīties vairāk
            </span>
            <i class="fa fa-arrow-right">
            </i>
          </a>
        </div>
        @break
        <?php  } ?>
        <?php if ($i==5) { ?>
        <a class="list-group-item" href="{{route('admin.user_managment.user.edit', $user)}}">
          <span class="collapsible_title">{{$user->name}}
          </span>
        </a>
        <?php } else if($i<5){ ?>
        <a class="list-group-item" href="{{route('admin.user_managment.user.edit', $user)}}">
          <span class="collapsible_title">{{$user->name}}
          </span>
        </a>

        <?php } $i++;?>
        @endforeach


      </div>

      <div class="collapsible block_fourth block-style accordion">
        <span class="icon-today"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>
      <p>
          <span class="label">Šodien 
          </span>
          <span class="label-number">{{$count_users_today}}
          </span>
        </p>
      </div>
      <div class="collapsible_content">
        <div class="more-link"> 
          <a  href="{{route('admin.user_managment.user.create')}}"  class="list-group-item list-group-more">
            <span>Izveidot lietotājus
            </span>
            <i class="fa fa-arrow-right">
            </i>
          </a>
        </div> 
        <?php $i=0 ?>
        @foreach   ($users_today as $user)
        <?php if ($i>3) { ?> 
        <div class="more-link"> 
          <a  href="{{route('admin.user_managment.user.index')}}"  class="list-group-item list-group-more">
            <span>Skatīties vairāk
            </span>
            <i class="fa fa-arrow-right">
            </i>
          </a>
        </div>
        @break
        <?php  } ?>
        <?php if ($i==5) { ?>
        <a class="list-group-item" href="{{route('admin.user_managment.user.edit', $user)}}">
          <span class="collapsible_title">{{$user->name}}
          </span>
        </a>
        <?php } if($i<5){ ?>
        <a class="list-group-item" href="{{route('admin.user_managment.user.edit', $user)}}">
          <span class="collapsible_title">{{$user->name}}
          </span>
        </a>
        <div class="more-link"> 
          <a  href="{{route('admin.user_managment.user.index')}}" class="list-group-item list-group-more">
            <span>Skatīties vairāk
            </span>
            <i class="fa fa-arrow-right">
            </i>
          </a>
        </div>
        <?php } $i++; ?>
        @endforeach
      </div>
    </div>
    <?php } else if($role->name == 'writer'){ ?>
    <span class="icon-forward-1">
    </span>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="collapsible block_first block-style">
           <span class="icon-cat"><span class="path1"></span><span class="path2"></span><span class="path3"></span><span class="path4"></span><span class="path5"></span></span>
            <p>
              <span class="label">Kategorijas 
              </span> 
              <span class="label-number">{{$count_categories}}
              </span>
            </p>
          </div>
          <div class="collapsible_content">
            <?php if (!empty($categories)) {
            $i=0 ?>
            @foreach ($categories as $category)
            <?php if ($i>3) { ?> 
            <div class="more-link"> 
              <a href="{{route('writer.category.index')}}" class="list-group-item list-group-more">
                <span>Skatīties vairāk
                </span>
                <i class="fa fa-arrow-right">
                </i> 
              </a>
            </div>
            @break
            <?php  } ?>
            <?php if ($i>5) { ?>
            @break
            <?php  } ?>
            <?php if ($i==5) { ?>
            <a class="list-group-item" href="{{route('writer.category.edit', $category)}}">
              <span class="collapsible_title">{{$category->title}}
              </span>
              <p class="list-group-item-text">
                {{$category->articles()->count()}}
              </p>
            </a>
            <div class="more-link"> 
              <a href="{{route('writer.category.index')}}" class="list-group-item list-group-more">
                <span>Skatīties vairāk
                </span>
                <i class="fa fa-arrow-right">
                </i> 
              </a>
            </div>
            <?php } else if($i<5){ ?>
            <a class="list-group-item" href="{{route('writer.category.edit', $category)}}">
              <span class="collapsible_title">{{$category->title}}
              </span>
              <p class="list-group-item-text">
                {{$category->articles()->count()}}
              </p>
            </a>
            <?php } $i++;?>
            @endforeach
            <?php }else { ?>
            <div class="create-block">
              <div class="more-link">
                <a class="list-group-item create_link"href="{{route('admin.category.create')}}">
                  <span class="collapsible_title">Kategorijas nav
                  </span>
                  <p class="list-group-item-text">
                    Izveidot kategoriju
                    <i class="fa fa-arrow-right">
                    </i>
                  </p>
                </a>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="collapsible block_second block-style accordion">
            <span class="icon-raks"></span>
            <p>
              <span class="label">Raksti 
              </span>  
              <span class="label-number"> {{$count_articles}}
              </span>
            </p>
          </div>
          <div class="collapsible_content">
            <?php if (!empty($articles)) { ?>
              <?php $i=0 ?>
              @foreach ($articles as $article)
              <?php if ($i>3) { ?> 
              <div class="more-link"> 
                <a href="{{route('writer.article.index')}}" class="list-group-item list-group-more">
                  <span>Skatīties vairāk
                  </span>
                  <i class="fa fa-arrow-right">
                  </i>
                </a>
              </div> 
              @break
              <?php  } ?>
              <?php if ($i==5) { ?>
              <a class="list-group-item" href="{{route('writer.article.edit', $article)}}">
                <span class="collapsible_title">{{$article->title}}
                </span>
                <p class="list-group-item-text">
                  {{$article->categories()->pluck('title')->implode(', ')}}
                </p>
              </a>
              <?php } else if($i<5){ ?>
              <a class="list-group-item" href="{{route('writer.article.edit', $article)}}">
                <span class="collapsible_title">{{$article->title}}
                </span>
                <p class="list-group-item-text">
                  {{$article->categories()->pluck('title')->implode(', ')}}
                </p>
              </a>
              <?php } $i++;?>
              @endforeach
            <?php } else { ?>
            <div class="create-block">
              <div class="more-link">
                <a class="list-group-item create_link"href="{{route('writer.article.create')}}">
                  <span class="collapsible_title">Rakstu nav
                  </span>
                  <p class="list-group-item-text">
                    Izveidot rakstu
                    <i class="fa fa-arrow-right">
                    </i>
                  </p>
                </a>
              </div>
            </div>
            <?php  } ?>
          </div>   
        </div>
        <?php } 
}
?>
