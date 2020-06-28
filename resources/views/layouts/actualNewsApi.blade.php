<div class="container news-row news-source ">
  <div class="title-container title-container-search">
    <div class="hedline-title-block"><h2 class="headline-title">Aktuālie Latvijā</h2></div><div class="line">|</div>
  </div>
  <?php 
  $json_result = file_get_contents ("http://newsapi.org/v2/top-headlines?country=lv&apiKey=d503590ced614b43832975cb00a31daf");
  $obj=json_decode($json_result);
  ?>
  <div class="row news-small-row-source loadMore ">
    <?php 
    foreach($obj->articles as $mydata){  ?>
      <div class="col-lg-4  col-md-4 col-sm-6 source-block">
        <div class="news-block">
          <a href="<?php echo $mydata->url ?> " target="_blank">
            <div class="news-container-small-row">
               <?php if(empty($mydata->urlToImage)){ ?>
                 <img class="news-image" src="{{URL::to('/images')}}/image-not-found.png"   alt="image-not-found-ikdiena">
               <?php } else {?>
                <img class="news-image" src="<?php echo $mydata->urlToImage ?> " alt="<?php echo $mydata->urlToImage ?>">
              <?php } ?>
                <div class="big-news_container_descript">
                  <div class="news-detal">
                  <h6 class="news-title"><i class="fas fa-link"></i> <?php echo substr($mydata->title, 0,30 )."…" ?> <span class="tooltiptext"><?php echo $mydata->title ?></span> </h6>
                  <div class="detal-info">
                    <div class="display-date">
                      {{ date('d-m-Y', strtotime($mydata->publishedAt)) }}
                        </div>
                    </div>
                 </div>
                </div>
            </div>
          </a>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="more-container">
    <div class="line">|</div><div class="more-title-block"><p class="small-body-text"><a href="#"id="loadMore" >SKATĪTIES VAIRĀK</a></p></div>
  </div>
  
</div>

