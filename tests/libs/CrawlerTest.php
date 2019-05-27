<?php

require_once realpath(__DIR__ . '/../../application/libs/Crawler.php');

use PHPUnit\Framework\TestCase;

class CrawlerTest extends TestCase
{
    public $crawler;

    /**
     * [setUp create Curl and object Crawler]
     */
    public function setUp() :void
    {
        $url = 'https://vietnamnet.vn/vn/the-gioi/binh-luan-quoc-te/choi-thue-vo-mat-trung-quoc-donald-trump-sap-trang-tay-531731.html';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        $this->crawler = new Crawler($url, $result);
    }

    /**
     * [testGetNameNewspaper consume name of newspaper with Vietnamnet]
     * @return [string] [name of newspaper]
     */
    public function testGetNameNewspaper()
    {
        $name = $this->crawler->getNameNewspaper();
        $this->assertSame('Vietnamnet', $name);
        return $name;
    }

    /**
     * [testGetContent check content is array or not]
     * @depends testGetNameNewspaper
     */
    public function testGetContent($name)
    {
        $content = $this->crawler->getContent($name);
        $this->assertIsArray($content);
    }

    /**
     * [testGetTitle check title is string or not]
     * @depends testGetNameNewspaper
     */
    public function testGetTitle($name)
    {
        $title = $this->crawler->getTitleTime('title'.$name, '</h1>');
        $this->assertIsString($title);
    }
}

?>