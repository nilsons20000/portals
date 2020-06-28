<?php 
foreach($article_founds as $post){ ?>
	<div class="col-sm-6 col-md-6 col-lg-3">
		<a href="{{route('article', $post->slug)}}" target="_blank">
			<div class="news-container-small-row search-row">
			<?php if(empty($post->image_path)){ ?>
	            <img class="news-image" src="{{URL::to('/images')}}/image-not-found.png"   alt="image-not-found-ikdiena">
	        <?php } else { ?>
	            <img class="news-image" src="{{URL::to('/images').'/'.$post->image_path}}" alt="">
	        <?php } ?>
		 	    <div class="big-news_container_descript">
		 	    	<div class="news-detal">
						<h6 class="news-title"><?php echo substr($post->title, 0,20)."…" ?><span class="tooltiptext"><?php echo 
						$post->title ?></span></h6>
						<div class="detal-info">
							@if($post->categories)
								@foreach($post->categories as $category)
			                        <div class="display-category">
			                            <strong>{{ $category->title }}</strong>
			                        </div>
			                	@endforeach
					        @endif
							@if($post->created_at)
								<div class="display-date">
					        	{{$post->created_at->format('d.m.Y') }}
					        	</div>
					        @endif
					    </div>
					 </div>
				</div>
			</div>
		</a>
	</div> <?php 
}?>