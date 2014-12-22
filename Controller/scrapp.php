<?php

$url = "http://www.qoqa.ch/";
$html = file_get_contents($url); //get the html returned from the following url

$DOM = new DOMDocument('1.0', 'UTF-8');
$DOM->loadHTML($html);
libxml_clear_errors();
$xpath = new DOMXPath($DOM);

//TODO seek by class or id field
/*
 * //div[@class="name"]
 * //div[@id="name"]
 */
//TODO in class do a enum
$tagType = 'span';
$seekBy = 'class';
$identifier = 'qoqa-price';
$qry = '//'.$tagType.'[@'.$seekBy.'="'.$identifier.'"]';
$resultQuery = $xpath->query($qry);

var_dump($resultQuery);


$item = $resultQuery->item(0);
echo '------------------------------------------------';
echo '<div style="color:blue;">'.$item->getNodePath().'</div></br>';
echo '<div style="color:red;">'.$item->getAttribute('class').'</div></br>';
echo '<div style="color:#ff8f08;">' .$item->getAttribute('id').'</div></br>';
echo '<div style="color:#006918;">' .$item->getAttribute('id').'</div></br>';
echo $item->nodeValue.'</br>';
echo '</br>';














