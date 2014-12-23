<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title></title>
<?php
/**
 * Created by PhpStorm.
 * User: kamhyh
 * Date: 22.12.2014
 * Time: 23:00
 */

require_once('../Controller/TagContent.php');
require_once('../Controller/Parser.php');

$parserQoqa = new Parser('http://www.qoqa.ch');
$parserQwine = new Parser('http://www.qwine.ch');
$parserQsport = new Parser('http://www.qsport.ch');
$parserQooking = new Parser('http://www.qooking.ch');

/*QOQA*/

$tagImgOfferQoqa = new TagContent($parserQoqa);
$tagImgOfferQoqa->build('img','id','showcase_media_DESKTOP_0');
$tagImgOfferQoqa->fetch();
$tagImgOfferQoqa->setStyle('width:50%;');

$tagPriceOfferQoqa = new TagContent($parserQoqa);
$tagPriceOfferQoqa->build('span','class','qoqa-price');
$tagPriceOfferQoqa->fetch();

$tagTitle_1_OfferQoqa = new TagContent($parserQoqa);
$tagTitle_1_OfferQoqa->build('span','class','brand');
$tagTitle_1_OfferQoqa->fetch();

$tagTitle_2_OfferQoqa = new TagContent($parserQoqa);
$tagTitle_2_OfferQoqa->build('span','class','name');
$tagTitle_2_OfferQoqa->fetch();

/*QWINE*/

$tagImgOfferQWine = new TagContent($parserQwine);
$tagImgOfferQWine->build('img','id','showcase_media_DESKTOP_0');
$tagImgOfferQWine->fetch();
$tagImgOfferQWine->setStyle('width:50%;');

$tagPriceOfferQWine = new TagContent($parserQwine);
$tagPriceOfferQWine->build('span','class','qoqa-price');
$tagPriceOfferQWine->fetch();

$tagTitle_1_OfferQWine  = new TagContent($parserQwine);
$tagTitle_1_OfferQWine ->build('span','class','brand');
$tagTitle_1_OfferQWine ->fetch();

$tagTitle_2_OfferQWine = new TagContent($parserQwine);
$tagTitle_2_OfferQWine->build('span','class','name');
$tagTitle_2_OfferQWine->fetch();

/*QSPORT*/

$tagImgOfferQSport = new TagContent($parserQsport);
$tagImgOfferQSport->build('img','id','showcase_media_DESKTOP_0');
$tagImgOfferQSport->fetch();
$tagImgOfferQSport->setStyle('width:50%;');

$tagPriceOfferQSport = new TagContent($parserQsport);
$tagPriceOfferQSport->build('span','class','qoqa-price');
$tagPriceOfferQSport->fetch();

$tagTitle_1_OfferQSport = new TagContent($parserQsport);
$tagTitle_1_OfferQSport ->build('span','class','brand');
$tagTitle_1_OfferQSport ->fetch();

$tagTitle_2_OfferQSport = new TagContent($parserQsport);
$tagTitle_2_OfferQSport->build('span','class','name');
$tagTitle_2_OfferQSport->fetch();

/*QOOKING*/

$tagImgOfferQooking = new TagContent($parserQooking);
$tagImgOfferQooking->build('img','id','showcase_media_DESKTOP_0');
$tagImgOfferQooking->fetch();
$tagImgOfferQooking->setStyle('width:50%;');

$tagPriceOfferQooking = new TagContent($parserQooking);
$tagPriceOfferQooking->build('span','class','qoqa-price');
$tagPriceOfferQooking->fetch();

$tagTitle_1_OfferQooking = new TagContent($parserQooking);
$tagTitle_1_OfferQooking ->build('span','class','brand');
$tagTitle_1_OfferQooking ->fetch();

$tagTitle_2_OfferQooking = new TagContent($parserQooking);
$tagTitle_2_OfferQooking->build('span','class','name');
$tagTitle_2_OfferQooking->fetch();
?>
</head>
<body>
<?php

echo $tagTitle_1_OfferQoqa->getContentWithTag().' '.$tagTitle_2_OfferQoqa->getContentWithTag().' | '.$tagPriceOfferQoqa->getContentWithTag();
echo '</br>';
echo $tagImgOfferQoqa->getContentWithTag();

echo '</br>';

echo $tagTitle_1_OfferQooking->getContentWithTag().' '.$tagTitle_2_OfferQooking->getContentWithTag().' | '.$tagPriceOfferQooking->getContentWithTag();
echo '</br>';
echo $tagImgOfferQooking->getContentWithTag();

echo '</br>';

echo $tagTitle_1_OfferQSport->getContentWithTag().' '.$tagTitle_2_OfferQSport->getContentWithTag().' | '.$tagPriceOfferQSport->getContentWithTag();
echo '</br>';
echo $tagImgOfferQSport->getContentWithTag();

echo '</br>';

echo $tagTitle_1_OfferQWine->getContentWithTag().' '.$tagTitle_2_OfferQWine->getContentWithTag().' | '.$tagPriceOfferQWine->getContentWithTag();
echo '</br>';
echo $tagImgOfferQWine->getContentWithTag();

?>

</body>
</html>