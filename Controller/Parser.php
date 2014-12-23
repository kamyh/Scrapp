<?php
/**
 * Created by PhpStorm.
 * User: kamhyh
 * Date: 23.12.2014
 * Time: 11:27
 */

class Parser
{
    public function __construct($url)
    {
        $this->url = $url;
        $this->initialisation();
    }

    private function initialisation()
    {
        //TODO extract in other class
        $html = file_get_contents($this->url);
        $DOM = new DOMDocument('4.0', 'ISO-8859-1');
        $DOM->loadHTML('<meta http-equiv="content-type" content="text/html; charset=utf-8">'.($html));
        libxml_clear_errors();
        $this->xpath = new DOMXPath($DOM);
    }

    public function getURL()
    {
        return $this->url;
    }

    public function getXPath()
    {
        return $this->xpath;
    }

    private $url;
    private $xpath;
}