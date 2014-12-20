<script language="JavaScript">
    function divClicked(input)
    {
        alert(input);

        window.event.stopPropagation();

        location.href = location.href + "?parameter=" + input;
    }

</script>

<?php
/**
 * Created by PhpStorm.
 * User: kamhyh
 * Date: 18.12.2014
 * Time: 22:12
 */

$parameter = $_GET['parameter'];

require_once('regex.php');
require_once('Model/Div.php');
require_once('Model/Tools.php');
require_once('Model/Color.php');

/*
 * Prepare the page to parse
 */
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

function searchDiv($depth,$xpath)
{
    $result = Array();

    $xpathIntoIterable = $xpath->query('//div');

    foreach($xpathIntoIterable as $item)
    {
        if(Tools::depth($item->getNodePath()) == $depth)
        {
            array_push($result,$item);
        }
    }

    return $result;
}

//TODO maybe do this without id selection too
function splitDiv($DOM,$id,$color)
{
    $overlay = 'z-index:10000;
	background-color:'.$color.';';

    $elem = $DOM->getElementById($id);
    $new= $DOM->createElement('div');

    $new->setAttribute('id', $elem->getAttribute('id'));
    $new->setAttribute('class', $elem->getAttribute('class'));
    $new->setAttribute('style', $elem->getAttribute('style'));

    $intersect = $DOM->createElement('div');
    $intersect->setAttribute('id', 'intersect');
    $intersect->setAttribute('onClick', 'divClicked(this.id);');
    $intersect->setAttribute('class', $elem->getAttribute('class'));
    $intersect->setAttribute('style',$overlay.$elem->getAttribute('style'));
    $intersect->appendChild($new);


    $array = iterator_to_array($elem->childNodes);
    foreach($array as $child)
    {
        $new->appendChild($child);
    }
    $elem->parentNode->replaceChild($intersect,$elem);

    return $DOM;
}

//$DOM = splitDiv($DOM,1);

echo '<div>Original</div>';
echo '---------------------------------';

echo $html;

echo '========================================';

echo '<div>Parsed</div>';
echo '---------------------------------';

$divLvlOne = searchDiv(1,$xpath);

$index = 0;

//color all node lvl 1 with different color
foreach($divLvlOne as $divNode)
{
    $DOM = splitDiv($DOM,$divNode->getAttribute('id'),$colors[$index%count($colors)]);
    $index++;
}


//RESPLIT first splitted div
$DOM->loadHTML($DOM->saveHTML());

$elem = $DOM->getElementById('intersect')->firstChild;

$subTags = iterator_to_array($elem->childNodes);

foreach($subTags as $child)
{
    if($child->nodeType != 3)
    {
        //echo $child->getAttribute('id').'</br>';
        $DOM = splitDiv($DOM,$child->getAttribute('id'),$colors[$index%count($colors)]);
        $index++;
    }
}


echo $DOM->saveHTML();





