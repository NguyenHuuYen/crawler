<?php

/**
 * Class CrawlerFactory.
 * This class like a factory to make Crawler.
 */

require_once 'Crawler.php';

class CrawlerFactory
{
    /**
     * Transform $url and $result to class Crawler.
     * @return object Crawler.
     */
    public static function crawlerArticle($url, $result)
    {
        return new Crawler($url, $result);
    }
}

?>