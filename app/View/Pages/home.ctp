<?php //*?>
<!-- JS FOR SLIDER -->
<script type="text/javascript" src="<?php echo $this->webroot;?>js/jquery.bxSlider.js"></script>
<!-- END JS -->
<script type="text/javascript">
jQuery(function(){
  // assign the slider to a variable
  var slider = jQuery('#slider1').bxSlider({
        controls: false,
        auto: true,
        speed: 600,
        pause: 4000,
        stopAuto: false,
        onBeforeSlide: function(currentSlide, totalSlides){
          jQuery('.thumbs a').removeClass('pager-active');
          jQuery('.thumbs a').eq(currentSlide).addClass('pager-active');
         }
  });
  //slider.reloadShow();
  // assign a click event to the external thumbnails
  jQuery('.thumbs a').click(function(){
        var thumbIndex = $('.thumbs a').index(this);
        // call the "goToSlide" public function
        slider.goToSlide(thumbIndex);

        // remove all active classes
        jQuery('.thumbs a').removeClass('pager-active');
        // assisgn "pager-active" to clicked thumb
        jQuery(this).addClass('pager-active');
        // very important! you must kill the links default behavior
        return false;
  });
  // assign "pager-active" class to the first thumb
        jQuery('.thumbs a:first').addClass('pager-active');
});
</script>
<?php //*/ ?>
<div id="leftSiderBar">
         <div id="featured" >
            <div id="slider1">
               <?php foreach ($featuredNews as $news): //pr($news)?>  
                <div class="div-img">
                    <a href="<?php echo $this->webroot; ?>news/<?php echo $news['News']['id'] ?>/<?php echo $this->requestAction('/news/makePrettyUrl/'.str_replace(":", " ", $news['News']['title']).'');?>">
                        <img src="<?php echo $this->webroot; ?>img/news/featured/<?php echo $news['News']['news_image']; ?>" height='257px'  width="672px" alt='news'>
                    </a>                   
                    <div class="games-summer">
                        <h3><a href="<?php echo $this->webroot; ?>news/<?php echo $news['News']['id'] ?>/<?php echo $this->requestAction('/news/makePrettyUrl/'.str_replace(":", " ", $news['News']['title']).'');?>">
                        <?php echo $news['News']['title'] ?></a></h3>
                        <p><?php echo substr(strip_tags($news['News']['content']), 1, 130); ?></p>
                    </div><!--games-summer-->
                </div>
                <?php endforeach?>
            </div>
            <div class="thumbs">
              <?php $i=1; foreach ($featuredNews as $news): //pr($news)?>    
                    <a href="#">
                        <?php //echo $news['News']['title'];//echo substr(strip_tags($news['News']['title']), 1, 10); ?>
                        <?php //echo $i; ?>
                        <img src="<?php echo $this->webroot; ?>img/news/small/<?php echo $news['News']['news_image']; ?>" height='35px'  width="120px" alt='news'>
                    </a>
               <?php $i++; endforeach?>
            </div>
        </div><!--feature-->     

        <ul id="latest-news" class="menu">
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
                    <small><span>by <a href="<?php echo $this->webroot.$usersUserNameList[$news['News']['user_id']];?>"><?php echo $usersUserNameList[$news['News']['user_id']]; ?></a>,</span> Posted <?php echo strftime("%d %b %Y",$news['News']['created']); ?></small>
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
                    <small><span>by <a href="<?php echo $this->webroot.$usersUserNameList[$news['News']['user_id']];?>"><?php echo $usersUserNameList[$news['News']['user_id']]; ?></a>,</span> Posted <?php echo strftime("%d %b %Y",$news['News']['created']); ?></small>
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
            <li><a href="<?php echo $this->webroot; ?>pages/home/xbox360" <?php if($platform == 'xbox360'): ?>class="current"<?php endif;?>>Xbox 360</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/ps3" <?php if($platform == 'ps3'): ?>class="current"<?php endif;?>>PS3</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/pc" <?php if($platform == 'pc'): ?>class="current"<?php endif;?>>PC</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/wii" <?php if($platform == 'wii'): ?>class="current"<?php endif;?>>Wii</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/3ds" <?php if($platform == '3ds'): ?>class="current"<?php endif;?>>3DS</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/vita" <?php if($platform == 'vita'): ?>class="current"<?php endif;?>>Vita</a></li>
            <li><a href="<?php echo $this->webroot; ?>pages/home/mobile" <?php if($platform == 'mobile'): ?>class="current"<?php endif;?>>Mobile</a></li>
            </ul>
        </div><!--multiMenu-->
        <div id="pressReviews" class="content tabcontent">
            <ul class="listContent">
            <?php foreach($latestReview as $review):?>
                <li>
                    <?php if ($review['Review']['review_image']!=''): ?>
                        <a href="<?php echo $this->webroot; ?>reviews/<?php echo $review['Review']['id'] ?>/<?php echo $this->requestAction('/reviews/makePrettyUrl/'.str_replace(":", " ", $review['Review']['title']).'');?>"> <img src="<?php echo $this->webroot; ?>img/review/big/<?php echo $review['Review']['review_image']; ?>" height='70px'  width="125px" alt=''></a>
                    <?php else: ?>
                         <a href="<?php echo $this->webroot; ?>reviews/<?php echo $review['Review']['id'] ?>/<?php echo $this->requestAction('/reviews/makePrettyUrl/'.str_replace(":", " ", $review['Review']['title']).'');?>"><img src="<?php echo $this->webroot; ?>img/default_news.gif" height='70px'  width="125px"/></a>
                    <?php endif;?>
                    <h1>
                        <a href="<?php echo $this->webroot; ?>reviews/<?php echo $review['Review']['id'] ?>/<?php echo strtolower(Inflector::slug($review['Review']['title'],'-'));?>">
                            <?php echo $review['Review']['title']; ?>
                        </a>
                    </h1>
                    <h6><span>by <a href="<?php echo $this->webroot.$usersUserNameList[$review['Review']['user_id']];?>"><?php echo $usersUserNameList[$review['Review']['user_id']]; ?></a></span>, Posted<?php echo strftime("%d %b %Y", $review['Review']['created']); ?></h6>
                    <p><?php echo substr(strip_tags($review['Review']['content']), 1, 150); ?></p>
                    <h6><a href="<?php echo $this->webroot; ?>reviews/<?php echo $review['Review']['id'] ?>/<?php echo strtolower(Inflector::slug($review['Review']['title'],'-'));?>">
                            <?php echo $review['Review']['total_comment']; ?>
                        </a></h6>
                    <div class="clr"></div>
                </li>
            <?php endforeach;?>    
            </ul><!--pressReviews-->
            <div id="pageNav">
                <ul>
                    <li><a class="clickCheck" href="<?php echo $this->webroot; ?>reviews/all/<?php echo $platform ?>/latest">Click here to view All</a></li>
                </ul>
            </div><!--pageNav-->
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
                    <h6><span>by <a href="<?php echo $this->webroot.$usersUserNameList[$preview['Preview']['user_id']];?>"><?php echo $usersUserNameList[$preview['Preview']['user_id']]; ?></a></span>, Posted<?php echo strftime("%d %b %Y", $preview['Preview']['created']); ?></h6>
                    <p><?php echo substr(strip_tags($preview['Preview']['content']), 1, 150); ?></p>
                    <h6><a href="<?php echo $this->webroot; ?>previews/<?php echo $preview['Preview']['id'] ?>/<?php echo strtolower(Inflector::slug($preview['Preview']['title'],'-'));?>">
                            <?php echo $preview['Preview']['total_comment']; ?>
                        </a></h6>
                    <div class="clr"></div>
                </li>
            <?php endforeach;?>    
            </ul><!--pressReviews-->
            <div id="pageNav">
            <ul>
                <li><a class="clickCheck" href="<?php echo $this->webroot; ?>previews/all/<?php echo $platform ?>/latest">Click here to view All</a></li>
            </ul>
        </div><!--pageNav-->
        </div><!--previews-->

<?php echo $this->element('trailer-home-page');?>

        <div class="blockHolder">
            <div class="contentBlock">
                <h1 class="contentTitle">Editorials</h1>
                <div class="boxContent">
                    <ul>
                    <?php foreach($editorials as $post):?> 
                        <li>
                         <?php if ($post['Feature']['feature_image']!=''): ?>
                            <a href="<?php echo $this->webroot; ?>features/<?php echo $post['Feature']['id'] ?>/<?php echo $this->requestAction('/features/makePrettyUrl/'.str_replace(":", " ",$post['Feature']['title']).'');?>"><img src="<?php echo $this->webroot; ?>img/feature/small/<?php echo $post['Feature']['feature_image'] ?>" height='43px'  width="76px" alt=''></a>
                        <?php else: ?>
                            <a href="<?php echo $this->webroot; ?>features/<?php echo $post['Feature']['id'] ?>/<?php echo $this->requestAction('/features/makePrettyUrl/'.str_replace(":", " ", $post['Feature']['title']).'');?>">
                                <img src="<?php echo $this->webroot; ?>img/default_news.gif" height='43px'  width="76px"/>
                            </a>                       
                        <?php endif;?>
                            <h1> <a href="<?php echo $this->webroot; ?>features/<?php echo $post['Feature']['id'] ?>/<?php echo strtolower(Inflector::slug($post['Feature']['title'],'-'));?>"><?php echo $post['Feature']['title']; ?>
                                </a>
                            </h1>
                            <h6 class="author">By <a href="<?php echo $this->webroot.$usersUserNameList[$post['Feature']['user_id']];?>"><?php echo $usersUserNameList[$post['Feature']['user_id']]; ?></a>,</h6>
                            <p class="detail"><?php echo substr(strip_tags($post['Feature']['content']), 1, 100); ?></p>
                            <h6 class="postedTime"><?php echo strftime("%d %b %Y", $post['Feature']['created']); ?></h6>
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
                         <?php if ($blog['Blog']['blog_image']!=''): ?>
                            <a href="<?php echo $this->webroot; ?>blogs/<?php echo $blog['Blog']['id'] ?>/<?php echo $this->requestAction('/blogs/makePrettyUrl/'.str_replace(":", " ", $blog['Blog']['title']).'');?>"><img src="<?php echo $this->webroot; ?>img/blog/small/<?php echo $blog['Blog']['blog_image'] ?>" height='43px'  width="76px" alt=''></a>
                        <?php else: ?>
                            <a href="<?php echo $this->webroot; ?>blogs/<?php echo $blog['Blog']['id'] ?>/<?php echo $this->requestAction('/blogs/makePrettyUrl/'.str_replace(":", " ", $blog['Blog']['title']).'');?>">
                                <img src="<?php echo $this->webroot; ?>img/default_news.gif" height='43px'  width="76px"/>
                            </a>                       
                        <?php endif;?>
                            <h1> <a href="<?php echo $this->webroot; ?>blogs/<?php echo $blog['Blog']['id'] ?>/<?php echo strtolower(Inflector::slug($blog['Blog']['title'],'-'));?>"><?php echo $blog['Blog']['title']; ?>
                                </a>
                            </h1>
                            <h6 class="author">By <a href="<?php echo $this->webroot.$usersUserNameList[$blog['Blog']['user_id']];?>"><?php echo $usersUserNameList[$blog['Blog']['user_id']]; ?></a>,</h6>
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