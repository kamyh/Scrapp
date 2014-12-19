<?php
/**
 * Created by PhpStorm.
 * User: kamhyh
 * Date: 18.12.2014
 * Time: 22:12
 */

require_once('regex.php');

$url = "./pagetest.php";
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

$selection = '/html/body';
$reg = new regex();

foreach($productsDescription as $item)
{
    echo '<div style="color:#166776;">' .$item->getNodePath().'</div></br>';

}

foreach($productsDescription as $item)
{
    echo '------------------------------------------------';
    echo '<div style="color:#166776;">' .$reg->isOneDivLvlOne($item->getNodePath()).'</div></br>';
    echo '<div style="color:#166776;">' .$reg->isOneDivLvlOneWithHook($item->getNodePath()).'</div></br>';
    echo '<div style="color:#020eff;">' .$item->getNodePath().'</div></br>';
    echo '<div style="color:red;">'.$item->getAttribute('class').'</div></br>';
    echo '<div style="color:#ff8f08;">' .$item->getAttribute('id').'</div></br>';
    echo '<div style="color:#006918;">' .$item->getAttribute('id').'</div></br>';
    echo $item->nodeValue.'</br>';
    echo '</br>';
}

var_dump($xpath);













