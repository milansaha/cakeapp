<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" encoding="UTF-8">
  <channel>
    <title>Noob's RSS Feed</title>
    <link>http://www.noobfeed.com/</link>
    <description>NoobFeed.com:Ultimate Gaming Fuel.</description>
    <language>en-us</language>
    <pubDate><?php echo date("D, j M Y H:i:s", gmmktime()) . ' GMT';?></pubDate>
    <generator>CakePHP</generator>
    <managingEditor>www.noobfeed.com</managingEditor>
    <webMaster>admin@noobfeed.com</webMaster>    


<?php foreach ($newses as $news):?>
    <item>
      <title>NEWS : <?php echo $this->My->slugify($news['News']['title'])?></title> 
      <link>http://www.noobfeed.com/news/<?php echo $news['News']['id'] ?>/<?php echo $this->requestAction('/news/makePrettyUrl/'.str_replace(":", " ", $news['News']['title']).'');?></link>
      <description>
      <?php  
          echo $this->My->slugify(substr($news['News']['content'], 0, 350));
          //echo htmlspecialchars(substr($news['News']['content'], 0, 350),ENT_QUOTES); 
      ?>...
      </description>
      <?php echo strftime("%d %b %Y", $news['News']['created']); ?>
      <?php //echo $time->nice($news ['News']['news_date']) . ' GMT'; ?>
       <pubDate><?php echo strftime("%d %b %Y", $news['News']['created']); ?><?php //echo $time->nice($time->gmt($news ['News']['news_date'])) . ' GMT'; ?></pubDate>
      <guid>http://www.noobfeed.com/news/<?php echo $news['News']['id'] ?>/<?php echo $this->requestAction('/news/makePrettyUrl/'.str_replace(":", " ", $news['News']['title']).'');?></guid>
    </item>
<?php endforeach; ?>  
<?php foreach ($previews as $preview):?>
    <item>
      <title>PREVIEW : <?php  echo $this->My->slugify($preview['Preview']['title']);?> </title>
      <link>http://www.noobfeed.com/previews/<?php echo $preview['Preview']['id'] ?>/<?php echo strtolower(Inflector::slug($preview['Preview']['title'],'-'));?></link>
       <description>
      <?php 
         echo $this->My->slugify(substr($preview ['Preview']['content'], 0, 350));
          //echo htmlspecialchars(strip_tags(substr($preview ['Preview']['content'],0, 300),'<p><br>'),ENT_QUOTES);
      ?>...</description>
      <?php echo strftime("%d %b %Y", $preview['Preview']['created']); ?>
      <pubDate><?php echo strftime("%d %b %Y", $preview['Preview']['created']); ?></pubDate>
      <guid>http://www.noobfeed.com/previews/<?php echo $preview['Preview']['id'] ?>/<?php echo strtolower(Inflector::slug($preview['Preview']['title'],'-'));?></guid>
    </item>
<?php endforeach; ?>
<?php  foreach ($reviews as $review):?>
    <item>
      <title>REVIEW : <?php echo $this->My->slugify($review['Review']['title']); ?></title>
      <link>http://www.noobfeed.com/reviews/<?php echo $review['Review']['id'] ?>/<?php echo $this->requestAction('/reviews/makePrettyUrl/'.str_replace(":", " ", $review['Review']['title']).'');?></link>
     <description>
      <?php echo $this->My->slugify(substr($review ['Review']['content'], 0, 350));
          //echo htmlspecialchars(substr($review ['Review']['content'], 0, 300),ENT_QUOTES);?>...</description>
      <?php echo strftime("%d %b %Y", $review['Review']['created']); ?>
       <pubDate><?php echo strftime("%d %b %Y", $review['Review']['created']); ?></pubDate>
      <guid>http://www.noobfeed.com/reviews/<?php echo $review['Review']['id'] ?>/<?php echo $this->requestAction('/reviews/makePrettyUrl/'.str_replace(":", " ", $review['Review']['title']).'');?></guid>
    </item>
    <?php endforeach; ?>  
<?php foreach ($features as $feature):?>
    <item>
      <title>FEATURE : <?php echo $this->My->slugify($feature ['Feature']['title']); ?></title>
      <link>http://www.noobfeed.com/features/<?php echo $feature['Feature']['id'] ?>/<?php echo $this->requestAction('/features/makePrettyUrl/'.str_replace(":", " ", $feature['Feature']['title']).'');?></link>
      <description>
      <?php echo $this->My->slugify(substr($feature ['Feature']['content'], 0, 350));
          //echo htmlspecialchars(substr($feature ['Feature']['content'], 0, 300),ENT_QUOTES);?>...</description>
      <?php echo strftime("%d %b %Y", $feature['Feature']['created']); ?>
      <pubDate><?php echo strftime("%d %b %Y", $feature['Feature']['created']); ?></pubDate>
      <guid>http://www.noobfeed.com/features/<?php echo $feature['Feature']['id'] ?>/<?php echo $this->requestAction('/features/makePrettyUrl/'.str_replace(":", " ", $feature['Feature']['title']).'');?></guid>
    </item>
    <?php endforeach; ?>  
<?php /*foreach ($games as $game):?>
    <item>
      <title>Game : <?php echo $this->My->slugify($game['Game']['title']); ?></title>
      <link><?php echo $this->webroot; ?>games/<?php echo $game['Game']['id'] ?>/<?php echo $this->requestAction('/features/makePrettyUrl/'.str_replace(":", " ", $game['Game']['title']).'');?></link>
      <description>
        Genre: <?php echo $game['Game']['genres']; ?>
        Release Date: <?php echo $game['Game']['release_date']; ?>
       <?php //echo $this->My->slugify(substr($feature ['Feature']['content'], 0, 300));?>...
      </description>      
      <pubDate><?php echo strftime("%d %b %Y", $game['Game']['created']); ?></pubDate>
      <guid><?php echo $this->webroot; ?>games/<?php echo $game['Game']['id'] ?>/<?php echo $this->requestAction('/features/makePrettyUrl/'.str_replace(":", " ", $game['Game']['title']).'');?></guid>
    </item>
<?php endforeach; */?>  
</channel>
</rss>