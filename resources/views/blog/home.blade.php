@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript">
</script>
@section('content')
<span class="icon-home"></span>
<div class="container">
	<div class="row">
		@php
		$i = 0
		@endphp
		@forelse ($articles as $article)
			<?php if ($i==0) { ?>
			<div class="col-lg-9 news-big">
					<div class="news-container-big">
						<a href="{{route('article', $article->slug)}}" target="_blank">
						<?php if (!empty($article->image_path)){ ?>
							<img class="news-image" src="{{URL::to('/images').'/'.$article->image_path}}" alt="ikdiena_article_image">
							<?php } else { ?>
							<img class="news-image" src="/images/image-not-found.png" alt="ikdien_image_not_found">
						<?php }?>
				 	    <div class="big-news_container_descript ">
				 	    	<div class="news-detal-long post"  data-postid="{{ $article->id }}">
								<h3  class="news-title">{{$article->title}}<span class="tooltiptext"><?php echo 
									$article->title ?></span></h3>
								<div class="row news-row">
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
								<div class="description_short">

								<p >{!!$article->description_short!!}</p></div>

							 </div>

			  			</div>
			  			</a>
					</div>
				</div>


			<?php } ?>
			@php
			$i++
			@endphp
			@empty
				<h2 class="text-center">Tukšs</h2>
				@endforelse
			@php
				$i = 0
			@endphp
			<div class="col-lg-3 news-small">
				@forelse ($articles as $article)
					<?php if ($i>=2 && $i<=3){ ?><a href="{{route('article', $article->slug)}}" target="_blank">
						<div class="news-container-small">
							<div class="small-news_container_descript">
								<?php if (!empty($article->image_path)){ ?>
									 <img class="news-image" src="{{URL::to('/images').'/'.$article->image_path}}" alt="ikdiena_article_image">
								<?php } else { ?>
									<img class="news-image" src="/images/image-not-found.png" alt="ikdien_image_not_found">
								<?php }?>
						 	    <div class="news-detal">
									<h6 class="news-title"><?php echo substr($article->title, 0,20)."…" ?><span class="tooltiptext"><?php echo $article->title ?></span></h6>
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
				 	<?php } ?>
			 		<?php if ($i==4){ ?>
						@break
			 		<?php } ?>
				@php
				$i++
				@endphp
			  	@empty
				<h2 class="text-center">Tukšs</h2>
				@endforelse
			</div>	 		
		</div>
</div>
<div class="container news-row news-row-home">
	<div class="title-container">
		<div class="hedline-title-block"><h2 class="headline-title">JAUNĀKIE</h2></div><div class="line">|</div>
	</div>
	<div class="row news-small-row">
		@php
		$i = 0
		@endphp
		@forelse ($articles as $article)
			<?php if ($i>=4 && $i<=7) { ?>
				<div class="col-lg-3 col-md-4 col-sm-6">
					<a href="{{route('article', $article->slug)}}" target="_blank">
						<div class="news-container-small-row small-row-image-home">
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
			<?php } ?>
			@php
			$i++
			@endphp
		@empty
			<h2 class="text-center">Tukšs</h2>
		@endforelse
	</div>
		
	<div class="more-container">
		<div class="line">|</div><div class="more-title-block"><p class="small-body-text"><a href="{{route('blog.all_article')}}" >SKATĪTIES VAIRĀK</a></p></div>
	</div>
</div>
@include('layouts.actualNewsApi')




@endsection


@include('cookieConsent::index')