<?php
/**
 * Created by PhpStorm.
 * User: kamhyh
 * Date: 18.12.2014
 * Time: 22:12
 */

$url = "http://www.qoqa.ch/";
$html = file_get_contents($url); //get the html returned from the following url

$DOM = new DOMDocument('1.0', 'UTF-8');
$DOM->loadHTML($html);
libxml_clear_errors();
$xpath = new DOMXPath($DOM);

/*
 * //div[@class="name"]
 * //div[@id="name"]
 */
$productsDescription = $xpath->query('//div');  //get all div

var_dump($xpath);

foreach($productsDescription as $item)
{
    echo '<div style="color:red;">'.$item->getAttribute('class').'</div></br>';
    echo $item->nodeValue.'</br>';
    echo '</br>';
}

var_dump($xpath);













