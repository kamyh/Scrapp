<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">

    <title></title>
    <link rel="stylesheet" href="css/checkbox.css" media="screen" type="text/css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300' rel='stylesheet' type='text/css'>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script type="text/javascript" src="js/scripts.js"></script>


<?php
error_reporting(E_ERROR | E_PARSE);
session_start();

$idDivToSplit = $_GET['parameter'];
echo $idDivToSplit;

if(isset($_GET['parameter']))
{
    if(!isset($_SESSION['arrayIdDivToSplit']))
    {
        $_SESSION['arrayIdDivToSplit'] = array($_GET['parameter']);
    }
    else
    {
        if (!in_array($_GET['parameter'],$_SESSION['arrayIdDivToSplit']))
        {
            array_push($_SESSION['arrayIdDivToSplit'], $_GET['parameter']);
        }
    }
}
else
{
    session_unset();
    $_SESSION['arrayIdDivToSplit'] = array();
}

$arrayIdDivToSplit = $_SESSION['arrayIdDivToSplit'];
var_dump($arrayIdDivToSplit);

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

function countDiv($xpath)
{
    $arrayOfXPath = $xpath->query('//div');  //get all div

    $result = 0;
    foreach($arrayOfXPath as $item)
    {
        if(regex::isIntersect($item->getAttribute('id')))
        {
            $result++;
        }
    }

    return $result;
}

//TODO maybe do this without id selection too
function splitDiv($DOM,$id,$color,$xpath)
{
    $overlay = 'z-index:10000;
	background-color:'.$color.';
	padding:8px;';

    $elem = $DOM->getElementById($id);
    $new= $DOM->createElement('div');

    //TODO do for more than just div tag ??
    if($elem->tagName == 'div')
    {
        $new->setAttribute('id', $elem->getAttribute('id'));
        $new->setAttribute('class', $elem->getAttribute('class'));
        $new->setAttribute('style', $elem->getAttribute('style'));

        $intersect = $DOM->createElement('div');
        $intersect->setAttribute('id', 'intersect' . countDiv($xpath));
        $intersect->setAttribute('onClick', 'divClicked(this.id);');
        $intersect->setAttribute('class', $elem->getAttribute('class'));
        $intersect->setAttribute('style', $overlay . $elem->getAttribute('style'));

        $uidChkBox = uniqid();
        $label = $DOM->createElement('label');
        $label->setAttribute('for', 'squaredTwo'.$uidChkBox);
        $chkBox = $DOM->createElement('input');
        $chkBox->setAttribute('type', 'checkbox');
        $chkBox->setAttribute('id', 'squaredTwo'.$uidChkBox);
        $chkBox->setAttribute('onClick', 'checkBoxClicked(this);');
        $chkBox->setAttribute('name', 'chack');
        $label->appendChild($chkBox);
        //$txt = $DOM->createTextNode('Keep');
        //$label->appendChild($txt);
        $chkBoxDiv = $DOM->createElement('div');
        $chkBoxDiv->setAttribute('class','squaredTwo');
        $chkBoxDiv->setAttribute('onClick', 'checkBoxClicked(this);');
        $chkBoxDiv->appendChild($label);

        $intersect->appendChild($chkBoxDiv);
        $intersect->appendChild($new);


        $array = iterator_to_array($elem->childNodes);
        foreach ($array as $child) {
            $new->appendChild($child);
        }
        $elem->parentNode->replaceChild($intersect, $elem);
    }

    return $DOM;
}
?>

</head>

<body>

<?php

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
    $DOM = splitDiv($DOM,$divNode->getAttribute('id'),$colors[$index%count($colors)],$xpath);
    $index++;
}


//RESPLIT

foreach($arrayIdDivToSplit as $toSplitDiv)
{
    $DOM->loadHTML($DOM->saveHTML());

    $elem = $DOM->getElementById($toSplitDiv)->childNodes->item(1);
    $subTags = iterator_to_array($elem->childNodes);

    foreach ($subTags as $child) {
        if ($child->nodeType != 3) {
            //echo $child->getAttribute('id').'</br>';
            $DOM = splitDiv($DOM, $child->getAttribute('id'), $colors[$index % count($colors)], $xpath);
            $index++;
        }
    }
}


echo $DOM->saveHTML();


?>

</br>

<div classe="controls" id="controls">
    <input type="submit"/>
    <label for="URL">URL <input name="URL" type="text"/></label>
    <input type="submit" value="Reload" onclick="reset()"/>
</div>

</body>
</html>