<?php

/**
* Class CrawlerController.
* Extends class Controller (application\core\Controller.php).
* Get data of the article to display and save in database.
*/

// Load Curl.php to init CURL.
require_once CORE_PATH . 'Curl.php';
// Load CrawlerFactory.php to create object Crawler.
require_once LIBRARY_PATH . 'CrawlerFactory.php';

class CrawlerController extends Controller
{
    // $data contains data of the article.
    protected $data = array ();

    public function __construct()
    {
        // Run __construct of class Controller to connect Database and load class CrawlerModel.
        parent::__construct();
        // Get data of the article, create Curl to get URL and a object CURL.
        $this->getDetails(new Curl());
    }

    // Direct to page Home.
    public function printHome()
    {
        return view('home');
    }

    // Direct to page Article and attach article's data.
    public function printArticle()
    {
        return view('article', $this->data);
    }

    // Save article's data to Database.
    public function saveArticle()
    {
        $this->model->save($this->data);
    }

    public function getDetails(Curl $curl)
    {
        // Create object CrawlerFactory, use method crawlerArticle to return object Crawler.
        $crawl = CrawlerFactory::crawlerArticle($curl->url, $curl->result);
        // Get data of the article.
        $this->data = $crawl->getArticle();
    }
}

?>