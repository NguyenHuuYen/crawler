<?php

/**
 * Class Crawler.
 * Extends abstract class DetailsArticle - define properties and methods.
 * Get title, time and content of the article.
 */

abstract class DetailsArticle
{
    /**
     * There are open tags to determine location of parts what we want to crawler.
     * Range limit number elements of content.
     */

    // VnExpress.
    public $titleVnexpress     = '<h1 class="title_news_detail mb10">';
    public $timeVnexpress      = '<span class="time left">';
    public $contentVnexpress   = '<p class="Normal">';
    public $rangeVnexpress     = 0;

    // VietnamNet.
    public $titleVietnamnet    = '<h1 class="title f-22 c-3e">';
    public $timeVietnamnet     = '<span class="ArticleDate  right">';
    public $contentVietnamnet  = '<p class="t-j">';
    public $rangeVietnamnet    = 0;

    // DanTri.
    public $titleDantri        = '<h1 class="fon31 mgb15">';
    public $timeDantri         = '<span class="fr fon7 mr2 tt-capitalize">';
    public $contentDantri      = '<p>';
    public $rangeDantri        = 3;

    public $url;
    public $result;

    abstract public function getArticle();   
    abstract public function getContent($tag);
    abstract public function getTitletime($tag_open, $tag_close);
    abstract public function getNameNewspaper();
}

class Crawler extends DetailsArticle
{
    // Receive url, result form object CURL.
    public function __construct($url, $result)
    {
        $this->url = $url;
        $this->result = $result;
    }

    /**
     * Get all of the article.
     * @return article's data.
     */
    public function getArticle()
    {
        $nameNewspaper = $this->getNameNewspaper();
        $data = array (
            'title' => $this->getTitleTime('title'.$nameNewspaper, '</h1>'),
            'time' => $this->getTitleTime('time'.$nameNewspaper, '</span>'),
            'content' => implode(' ', $this->getContent($nameNewspaper)),
            'url' => $this->url,
            'newspaper' => $nameNewspaper
        );
        return $data;
    }

    /**
     * Get content.
     * @return article's content.
     */
    public function getContent($tag)
    {
        // Variable contains content.
        $content = array ();
        // Explode $result by $tag_open.
        $_content = explode($this->{'content'.$tag}, $this->result);
        // Get number element of content base on $range.
        for ($i = 1; $i < count($_content) - $this->{'range'.$tag}; $i++) {
            // Function stritr() to get text is in front of $tag_close of string $value[1].
            // Function strip_tags() to remove HTML tags are not necessary.
            // Function trim() to remove spaces.
            $content[] = trim(strip_tags(stristr($_content[$i], '</p>', true)));
        }
        return $content;
    }

    /**
     * Get title or time.
     * @return article's title or time.
     */
    public function getTitleTime($tag_open, $tag_close)
    {
        // Explode $result by $tag_open.
        $value = explode($this->{$tag_open}, $this->result);
        // Function stritr() to get text is in front of $tag_close of string $value[1].
        // Function trim() to remove spaces.
        $_value = trim(stristr($value[1], $tag_close, true));
        return $_value;
    }

    /**
     * Get content.
     * @return newspaper's name.
     */
    public function getNameNewspaper()
    {
        // Explode URL to get domain.
        $bit = explode('/', $this->url);
        // Check head domain have or not have http or https.
        if ($bit[0] == 'http:' || $bit[0] == 'https:') {
            $domain = $bit[2];
        } else {
            $domain = $bit[0];
        }
        // Get name of domain.
        $name = explode('.', $domain);
        // Uppercase the first word.
        return ucfirst($name[0]);
    }
}

?>