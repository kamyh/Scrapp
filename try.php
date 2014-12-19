<?php
/**
 * Created by PhpStorm.
 * User: kamhyh
 * Date: 18.12.2014
 * Time: 22:12
 */

require_once('regex.php');
require_once('Model/Div.php');
require_once('Model/Tools.php');

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

$divs = [];

foreach($productsDescription as $item)
{
    echo '<div style="color:#166776;">' .$item->getNodePath().'</div></br>';
    array_push($divs,new Div($item->getAttribute('class'),$item->getAttribute('id'),$item->getAttribute('value'),$item->getAttribute('style'),substr_count($item->getNodePath(), '/')-2,$item->nodeValue));
}

$overlay = 'z-index:10000;
	background-color: rgba(0,0,0,0.5);';

$elem = $DOM->getElementById("1");
$new= $DOM->createElement('div');
$new->setAttribute('id', 'n');
$intersect = $DOM->createElement('div');
$intersect->setAttribute('id', 'intersect');
$intersect->setAttribute('style',$overlay);
$intersect->appendChild($new);


$array = iterator_to_array($elem->childNodes);
foreach($array as $child)
{
    $new->appendChild($child);
}
$elem->parentNode->replaceChild($intersect,$elem);

echo $DOM->saveHTML();

echo Tools::depth('html/body/div');

/*
foreach($divs as $div)
{
    //TODO close each div at right moment
    $toEcho = $div->toString().'</br>';

    if($div->getDepth() < $prevDepth)
    {
        $toEcho .= $div->getContent();
        $toEcho .= '</div></br>';
    }

    $prevDepth = $div->getDepth();
    echo '--> '.$prevDepth;
    echo $toEcho;
}

/*

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
*/













