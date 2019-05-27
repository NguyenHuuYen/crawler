<?php

require_once realpath(__DIR__ . '/../../application/core/Curl.php');

use PHPUnit\Framework\TestCase;

class CurlTest extends TestCase
{
    /**
     * Test creat object Curl and valid result after execute.
     * If true url return '.'.
     * If false url return 'F'.
     * @dataProvider providerTestCreateCurl
     */
    public function testCreateCurl($url)
    {
        $_POST['url'] = $url;
        $curl = new Curl();
        $this->assertIsString($curl->result);
    }

    public function providerTestCreateCurl()
    {
        return array (
            array ('https://vietnamnet.vn/vn/the-gioi/binh-luan-quoc-te/choi-thue-vo-mat-trung-quoc-donald-trump-sap-trang-tay-531731.html'),
            array ('https://dantri.com.vn/the-thao/vff-bi-phat-gan-40-nghin-usd-vi-phao-sang-o-vong-loai-u-23-chau-a-20190515140626400.htm'),
            array ('abc')
        );
    }
}

?>