<main role="main">

  <div class="album py-5 bg-light">
    <div class="container">
    
    <div class="row my-4">
	    <div class="col-lg-12">
	        
	        <a  id="refresh-popular-videos" href="/refresh-trending" class="btn btn-primary float-right">Refresh</a>
	    </div>

	</div>
      <div class="row">
      	<?php foreach ($videos as $video_item):?>		
    
        <div class="col-md-4">
          <div class="card mb-4 box-shadow video-clickable" id="<?=$video_item->videoId?>">
            <img class="card-img-top" src="<?=$video_item->videoThumbnails->high->url?>" alt="Card image cap">
            <p class="video-time-text"><?=isset($video_item->timeText)?$video_item->timeText:""?></p>
            <div class="card-body">
              <p class="card-text"><?=$video_item->title?></p>
              <div class="d-flex justify-content-between align-items-center">
                
                <small class="text-muted"><?=isset($video_item->author)?$video_item->author:""?></small>
                <small class="text-muted"><?=isset($video_item->viewCount)?shorten_number($video_item->viewCount)." views":""?></small>
                <small class="text-muted"><?=isset($video_item->publishedText)?$video_item->publishedText:""?></small>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>  
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