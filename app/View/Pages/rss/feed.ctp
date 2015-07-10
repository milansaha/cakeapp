<?php 
	$this->set('channelData', array(
    'title' => __("Noob's RSS Feed"),
    'link' => $this->Html->url('/', true),
    'description' => __("NoobFeed.com:Ultimate Gaming Fuel."),
    'language' => 'en-us'
));
// Import Sanitize
App::uses('Sanitize', 'Utility');

foreach ($allnews as $post) {
    $postTime = strtotime($post['News']['created']);

    $postLink = 'http://www.noobfeed.com/news/'.$post['News']['id'] .'/'.$this->requestAction('/news/makePrettyUrl/'.str_replace(":", " ", $post['News']['title']).'');

    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $post['News']['content']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => 'News: '.$post['News']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $post['News']['created']
    ));
}

foreach ($previews as $post) {
    $postTime = strtotime($post['Preview']['created']);

    $postLink = 'http://www.noobfeed.com/previews/'.$post['Preview']['id'] .'/'.$this->requestAction('/previews/makePrettyUrl/'.str_replace(":", " ", $post['Preview']['title']).'');

    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $post['Preview']['content']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => 'Preview: '.$post['Preview']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $post['Preview']['created']
    ));
}

foreach ($reviews as $post) {
    $postTime = strtotime($post['Review']['created']);

    $postLink = 'http://www.noobfeed.com/reviews/'.$post['Review']['id'] .'/'.$this->requestAction('/reviews/makePrettyUrl/'.str_replace(":", " ", $post['Review']['title']).'');

    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $post['Review']['content']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => 'Review: '.$post['Review']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $post['Review']['created']
    ));
}

foreach ($features as $post) {
    $postTime = strtotime($post['Feature']['created']);

    $postLink = 'http://www.noobfeed.com/features/'.$post['Feature']['id'] .'/'.$this->requestAction('/features/makePrettyUrl/'.str_replace(":", " ", $post['Feature']['title']).'');

    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $post['Feature']['content']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => 'Feature: '.$post['Feature']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $post['Feature']['created']
    ));
}

foreach ($blogs as $post) {
    $postTime = strtotime($post['Blog']['created']);

    $postLink = 'http://www.noobfeed.com/blogs/'.$post['Blog']['id'] .'/'.$this->requestAction('/blogs/makePrettyUrl/'.str_replace(":", " ", $post['Blog']['title']).'');

    // This is the part where we clean the body text for output as the description
    // of the rss item, this needs to have only text to make sure the feed validates
    $bodyText = preg_replace('=\(.*?\)=is', '', $post['Blog']['content']);
    $bodyText = $this->Text->stripLinks($bodyText);
    $bodyText = Sanitize::stripAll($bodyText);
    $bodyText = $this->Text->truncate($bodyText, 400, array(
        'ending' => '...',
        'exact'  => true,
        'html'   => true,
    ));

    echo  $this->Rss->item(array(), array(
        'title' => 'Blog: '.$post['Blog']['title'],
        'link' => $postLink,
        'guid' => array('url' => $postLink, 'isPermaLink' => 'true'),
        'description' => $bodyText,
        'pubDate' => $post['Blog']['created']
    ));
}
?>

