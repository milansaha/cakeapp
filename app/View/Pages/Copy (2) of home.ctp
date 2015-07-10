<div id="leftSiderBar">
        	
         <div id="featured" >
		  <ul class="ui-tabs-nav">
        <?php $i=1; foreach($featuredNews as $news):?>
	        <li class="ui-tabs-nav-item ui-tabs-selected" id="nav-fragment-<?php echo $i;?>">
                <a href="#fragment-<?php echo $i;?>"><img src="<?php echo $this->webroot;?>img/news/small/<?php echo $news['News']['news_image'];?>" height='50px'  width="97px"alt="" />
                </a>
            </li>
        <?php $i++; endforeach;?>           
	      </ul>

    <?php $i=1; foreach($featuredNews as $news):?>
	    <!-- First Content -->
	    <div id="fragment-<?php echo $i;?>" class="ui-tabs-panel" style="">
			<img src="<?php echo $this->webroot;?>img/news/small/<?php echo $news['News']['news_image'];?>" height='272px'  width="576px"alt="" />
			 <div class="info" >
				<h2>
                    <a href="<?php echo $this->webroot;?>news/<?php echo $news['News']['id']?>/<?php echo strtolower(Inflector::slug($news['News']['title'],'-'));?>"><?php echo $news['News']['title'];?></a>
                </h2>
				<p> <?php echo substr(strip_tags($news['News']['content']),1,150);?>... </p>
			 </div>
	    </div>
   <?php $i++; endforeach;?>
	    
		</div><!--feature-->
        
        <ul id="latest" class="menu">
			<li class="active"><a href="#latestNews">Latest News</a></li>
			<li><a href="#mostPopular">Most Popular</a></li>
		</ul>
		<div id="latestNews" class="content tabcontent">
        	<ul class="listContent">
            	<?php foreach($latestNews as $news):?>
            	<li>
                	<a href="<?php echo $this->webroot;?>news/<?php echo $news['News']['id']?>/<?php echo strtolower(Inflector::slug($news['News']['title'],'-'));?>">
						<img src="<?php echo $this->webroot;?>img/news/big/<?php echo $news['News']['news_image'];?>" height='109px'  width="197px" alt='news'>
					</a>
                    <h1><a href="<?php echo $this->webroot;?>news/<?php echo $news['News']['id']?>/<?php echo strtolower(Inflector::slug($news['News']['title'],'-'));?>"><?php echo $news['News']['title']?></a></h1>
                    <small><span>By <?php echo $usersUserNameList[$news['News']['user_id']]; ?>,</span> Posted <?php echo strftime("%d %b %Y",$news['News']['created']); ?></small>
                    <p><?php echo substr(strip_tags($news['News']['content']),1,180);?><a href="<?php echo $this->webroot;?>news/<?php echo $news['News']['id']?>/<?php echo strtolower(Inflector::slug($news['News']['title'],'-'));?>" class="readMore"> [read more]</a> </p>
        
        			<h6><a href="<?php echo $this->webroot;?>news/<?php echo $news['News']['id']?>/<?php echo strtolower(Inflector::slug($news['News']['title'],'-'));?>"><?php echo $news['News']['total_comment']; ?></a></h6>
                    <div class="clr"></div>
                </li>
              <?php endforeach;?>
            </ul><!--end-->			
		</div><!--description-->
		<div id="mostPopular" class="content tabcontent">
			<ul class="listContent inside">
			<?php foreach($popularNews as $news):?>
            	<li>
                	<a href="<?php echo $this->webroot;?>news/<?php echo $news['News']['id']?>/<?php echo strtolower(Inflector::slug($news['News']['title'],'-'));?>"><img src="<?php echo $this->webroot;?>img/news/big/<?php echo $news['News']['news_image'];?>" height='109px'  width="197px" alt='news'></a>
                    <h1><a href="<?php echo $this->webroot;?>news/<?php echo $news['News']['id']?>/<?php echo strtolower(Inflector::slug($news['News']['title'],'-'));?>"><?php echo $news['News']['title']?></a></h1>
                    <small><span>By <?php echo $usersUserNameList[$news['News']['user_id']]; ?>,</span> Posted <?php echo strftime("%d %b %Y",$news['News']['created']); ?></small>
                    <p><?php echo substr(strip_tags($news['News']['content']),1,180);?><a href="<?php echo $this->webroot;?>news/<?php echo $news['News']['id']?>/<?php echo strtolower(Inflector::slug($news['News']['title'],'-'));?>" class="readMore"> [read more]</a> </p>
        
        			<h6><a href="<?php echo $this->webroot;?>news/<?php echo $news['News']['id']?>/<?php echo strtolower(Inflector::slug($news['News']['title'],'-'));?>"><?php echo $news['News']['total_comment']; ?></a></h6>
                    <div class="clr"></div>
                </li>
              <?php endforeach;?>                
            </ul>
		</div><!--usages-->
        <div id="multiMenu">
            <ul id="reviews" class="menu">
                <li class="active"><a href="#pressReviews">Reviews</a></li>
                <li><a href="#previews">Previews</a></li>
                <li><a href="#trailers">Trailers</a></li>
            </ul>
            <ul class="listMenu">
            <li><a href="<?php echo $this->webroot; ?>pages/home/xbox360" class="current">Xbox 360</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/ps3">PS3</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/pc">PC</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/wii">Wii</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/3ds">3DS</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/vita">Vita</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/mobile">Mobile</a></li>
            </ul>
        </div><!--multiMenu-->
		<div id="pressReviews" class="content tabcontent">
        	<ul class="listContent">
            <?php foreach($latestReview as $review):?>
            	<li>
                <img src="<?php echo $this->webroot; ?>img/review/big/<?php echo $review['Review']['review_image']; ?>" height='70px'  width="125px" alt=''>
                    <h1>
                        <a href="<?php echo $this->webroot; ?>reviews/<?php echo $review['Review']['id'] ?>/<?php echo strtolower(Inflector::slug($review['Review']['title'],'-'));?>">
                            <?php echo $review['Review']['title']; ?>
                        </a>
                    </h1>
                    <h6><span>by <?php echo $usersUserNameList[$review['Review']['user_id']]; ?></span>, Posted<?php echo strftime("%d %b %Y", $review['Review']['created']); ?></h6>
                    <p><?php echo substr(strip_tags($review['Review']['content']), 1, 150); ?></p>
        			<h6><a href="<?php echo $this->webroot; ?>reviews/<?php echo $review['Review']['id'] ?>/<?php echo strtolower(Inflector::slug($review['Review']['title'],'-'));?>">
                            <?php echo $review['Review']['total_comment']; ?>
                        </a></h6>
                    <div class="clr"></div>
                </li>
            <?php endforeach;?>    
            </ul><!--pressReviews-->
			
		</div><!--description-->

		<div id="previews" class="content tabcontent">
			<ul class="listContent">
            <?php foreach($latestPreview as $preview):?>
                <li>
                <img src="<?php echo $this->webroot; ?>img/preview/big/<?php echo $preview['Preview']['preview_image']; ?>" height='70px'  width="125px" alt=''>
                    <h1>
                        <a href="<?php echo $this->webroot; ?>previews/<?php echo $preview['Preview']['id'] ?>/<?php echo strtolower(Inflector::slug($preview['Preview']['title'],'-'));?>">
                            <?php echo $preview['Preview']['title']; ?>
                        </a>
                    </h1>
                    <h6><span>by <?php echo $usersUserNameList[$preview['Preview']['user_id']]; ?></span>, Posted<?php echo strftime("%d %b %Y", $preview['Preview']['created']); ?></h6>
                    <p><?php echo substr(strip_tags($preview['Preview']['content']), 1, 150); ?></p>
                    <h6><a href="<?php echo $this->webroot; ?>previews/<?php echo $preview['Preview']['id'] ?>/<?php echo strtolower(Inflector::slug($preview['Preview']['title'],'-'));?>">
                            <?php echo $preview['Preview']['total_comment']; ?>
                        </a></h6>
                    <div class="clr"></div>
                </li>
            <?php endforeach;?>    
            </ul><!--pressReviews-->
		</div><!--previews-->

        <div id="trailers" class="content tabcontent">
            <?php foreach($latestTrailer as $game):?>
               <?php //echo $game['Game']['youtube_url']; ?>
            <?php endforeach;?>    
		</div><!--trailers-->

        <div class="blockHolder">
        	<div class="contentBlock">
            	<h1 class="contentTitle">Editorials</h1>
                <div class="boxContent">
                	<ul>
                    <?php foreach($editorialBlogs as $blog):?>
                    	<li>
                        	<h1 class="features">
                                <a href="<?php echo $this->webroot; ?>blogs/<?php echo $blog['Blog']['id'] ?>/<?php echo strtolower(Inflector::slug($blog['Blog']['title'],'-'));?>"><?php echo $blog['Blog']['title']; ?>
                                </a>
                            </h1>
                            <p><?php echo substr(strip_tags($blog['Blog']['content']), 1, 100); ?></p>
                            <h6 class="postedTime"><?php echo strftime("%d %b %Y", $blog['Blog']['created']); ?></h6>
                        </li>
                      <?php endforeach;?>    
                    </ul>
                </div><!--boxContent-->
            </div>
            <div class="contentBlock contentBlockRight">
            	<h1 class="contentTitle">Featured</h1>
                <div class="boxContent">
                	<ul>
                    <?php foreach($featuredBlogs as $blog):?> 
                    	<li>
                        	<img src="<?php echo $this->webroot; ?>img/blog/small/<?php echo $blog['Blog']['blog_image'] ?>" height='43px'  width="76px" alt=''>
                        	<h1> <a href="<?php echo $this->webroot; ?>blogs/<?php echo $blog['Blog']['id'] ?>/<?php echo strtolower(Inflector::slug($blog['Blog']['title'],'-'));?>"><?php echo $blog['Blog']['title']; ?>
                                </a>
                            </h1>
                            <h6 class="author">By <?php echo $usersUserNameList[$blog['Blog']['user_id']]; ?>,</h6>
                            <p class="detail"><?php echo substr(strip_tags($blog['Blog']['content']), 1, 100); ?></p>
                            <h6 class="postedTime"><?php echo strftime("%d %b %Y", $blog['Blog']['created']); ?></h6>
                        </li>
                       <?php endforeach;?>      
                    </ul>
                </div><!--boxContent-->
            </div>
        <div class="clr"></div>
        </div><!--blockHolder-->
        </div>