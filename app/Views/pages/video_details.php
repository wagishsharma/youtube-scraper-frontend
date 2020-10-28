<main role="main">

  <div class="py-5 mt-5 bg-light">

    <div class="container">
    	
    <div class="row  text-center text-white">
      <div class="bg-dark col-md-6 pt-5 pb-5 pl-5 pr-5">
			<div class="video-container">
				<iframe class="responsive-iframe" height="315" width="560" src="https://www.youtube.com/embed/<?=$video_details->video->videoId;?>?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
			<div class="video-details">
				<h4><?=$video_details->video->title;?></h4>
        <form action="<?=getenv('SERVER_URL')?>api/videos/<?=$video_details->video->videoId?>/download/" method="GET">
            
            <div class="form-group text-center">
                <input class="btn btn-primary" type="submit" value="Download" />
            </div>
        </form>
        
        <div>
        
        <small><?=isset($video_details->video->viewCount)?shorten_number($video_details->video->viewCount)." views":""?></small>
        <small><?=isset($video_details->video->likeCount)?shorten_number($video_details->video->likeCount)." likes" :""?></small>
        <small><?=isset($video_details->video->dislikeCount)?shorten_number($video_details->video->dislikeCount)." dislikes" :""?></small>
        </div>
          		<p class="description mt-3"><?=$video_details->video->description;?></p>
			</div>
       </div>
       <div class="bg-white col-md-6 pt-5 pb-5 pl-5 pr-5">
       		<div class="bg-light pt-5 pb-5 pl-5 pr-5 text-dark">
       			<img src="<?=$video_details->channel->channelThumbnail->default->url?>" alt="Card image cap">
           
       			<h4><?=$video_details->channel->title;?></h4>
             <div>
              <small><?=isset($video_details->channel->subscriberCount)?shorten_number($video_details->channel->subscriberCount)." subscribers" :""?></small>
            </div>
            <div class="mt-3 mb-3">
              <p class="description"><?=$video_details->channel->description;?></p>
            </div>
          		
       		</div>
       </div>
      
    </div>

    </div>

  </div>

</main>

<?php function shorten_number($n, $precision = 2) {
    
    if ($n < 1000) {
        // Anything less than a million
        $n_format = number_format($n);
    }else if ($n < 1000000) {
      $n_format = number_format($n / 1000, $precision) . 'K';
    } else if ($n < 1000000000) {
        // Anything less than a billion
        $n_format = number_format($n / 1000000, $precision) . 'M';
    } else {
        // At least a billion
        $n_format = number_format($n / 1000000000, $precision) . 'B';
    }

    return $n_format;
} ?>