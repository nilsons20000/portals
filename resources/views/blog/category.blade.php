@extends('layouts.app')

@section('title', $category->title . " News")

@section('content')

<?php if(count($articles)) { ?>
	<div class="container news-row">
		<div class="title-container ">
			<div class="hedline-title-block"><h2 class="headline-title">Kategorijas {{$category->title}} raksti</h2></div><div class="line news-search-line">|</div>
		</div>
			<div class="row news-small-row">
				@forelse ($articles as $article)
					<div class="col-lg-3">
						<a href="{{route('article', $article->slug)}}" target="_blank">
							<div class="news-container-small-row search-row">
								<?php if (!empty($article->image_path)){ ?>
									 <img class="news-image" src="{{URL::to('/images').'/'.$article->image_path}}" alt="ikdiena_article_image">
								<?php } else { ?>
									<img class="news-image" src="/images/image-not-found.png" alt="ikdien_image_not_found">
								<?php }?>
						 	    <div class="big-news_container_descript">
						 	    	<div class="news-detal">
										<h6 class="news-title"><?php echo substr($article->title, 0,20)."…" ?><span class="tooltiptext"><?php echo 
										$article->title ?></span></h6>
										<div class="detal-info">
											@if($article->categories)
												@foreach($article->categories as $category)
							                        <div class="display-category">
							                            <strong>{{ $category->title }}</strong>
							                        </div>
							                	@endforeach
									        @endif
											@if($article->created_at)
												<div class="display-date">
									        	{{$article->created_at->format('d.m.Y') }}
									        	</div>
									        @endif
									    </div>
									 </div>
					  			</div>
							</div>
						</a>
					</div>
				@empty
					<h2 class="text-center">Tukšs</h2>
				@endforelse
			</div>
	</div>
	<?php }else { ?>
		 <div class="register-container-line ">
		    <div class="container container-user-auth register-line">
		            <div class="search-container">
		                <div class="search-block" >
		                   <h3 class="search-title">Kategoriju rezultāti</h3>
		                   <h3 class="search-descript">Hmmmm… Šajā kategorija ziņas vel nav pievienotas!</h3>
		                   <div class="form-group">
		                        <div class="button">
		                            <a href="{{ url('/') }}"><button type="submit" class="btn save-btn">
		                                ATPAKAĻ UZ SĀKUMU
		                            </button></a>
		                        </div>
		                    </div>
		                </div>
		            </div> 
		    </div>
		</div>
<?php } ?>

@include('layouts.actualNewsApi')

@endsection



