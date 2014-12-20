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
/*
$productsDescription = $xpath->query('//div');  //get all div

$selection = '/html/body';
$reg = new regex();

$divs = [];


foreach($productsDescription as $item)
{
    echo '<div style="color:#166776;">' .$item->getNodePath().'</div></br>';
    array_push($divs,new Div($item->getAttribute('class'),$item->getAttribute('id'),$item->getAttribute('value'),$item->getAttribute('style'),substr_count($item->getNodePath(), '/')-2,$item->nodeValue));
}
*/

$overlay = 'z-index:10000;
	background-color: rgba(0,0,0,0.4);';


$elem = $DOM->getElementById("1");
$new= $DOM->createElement('div');

$new->setAttribute('id', $elem->getAttribute('id'));
$new->setAttribute('class', $elem->getAttribute('class'));
$new->setAttribute('style', $elem->getAttribute('style'));

$intersect = $DOM->createElement('div');
$intersect->setAttribute('id', 'intersect');
$intersect->setAttribute('class', $elem->getAttribute('class'));
$intersect->setAttribute('style',$overlay.$elem->getAttribute('style'));
$intersect->appendChild($new);


$array = iterator_to_array($elem->childNodes);
foreach($array as $child)
{
    $new->appendChild($child);
}
$elem->parentNode->replaceChild($intersect,$elem);

echo '<div>Original</div>';
echo '---------------------------------';

echo $html;

echo '========================================';

echo '<div>Parsed</div>';
echo '---------------------------------';

echo $DOM->saveHTML();

//echo Tools::depth('html/body/div');














