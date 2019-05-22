<?php

/**
 * Class Curl.
 * Get URL and create object CURL.
 */

class Curl
{
    public $url;
    public $curl;
    public $result;

    // Whenever crawler a article, object CURL is created too.
    public function __construct()
    {
        $this->url = $_POST['url'];
        // Init a CURL.
        $this->curl = curl_init($this->url);
        // Set CURL return values instead of display url soon.
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        // Result is values is returned.
        $this->result = curl_exec($this->curl);
    }
}

?>