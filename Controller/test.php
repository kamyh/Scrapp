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

require_once('TagContent.php');

/*QOQA*/

$tagImgOfferQoqa = new TagContent('http://www.qoqa.ch');
$tagImgOfferQoqa->build('img','id','showcase_media_DESKTOP_0');
$tagImgOfferQoqa->fetch();
$tagImgOfferQoqa->setStyle('width:50%;');

$tagPriceOfferQoqa = new TagContent('http://www.qoqa.ch');
$tagPriceOfferQoqa->build('span','class','qoqa-price');
$tagPriceOfferQoqa->fetch();

$tagTitle_1_OfferQoqa = new TagContent('http://www.qoqa.ch');
$tagTitle_1_OfferQoqa->build('span','class','brand');
$tagTitle_1_OfferQoqa->fetch();

$tagTitle_2_OfferQoqa = new TagContent('http://www.qoqa.ch');
$tagTitle_2_OfferQoqa->build('span','class','name');
$tagTitle_2_OfferQoqa->fetch();

/*QWINE*/

$tagImgOfferQWine = new TagContent('http://www.qwine.ch');
$tagImgOfferQWine->build('img','id','showcase_media_DESKTOP_0');
$tagImgOfferQWine->fetch();
$tagImgOfferQWine->setStyle('width:50%;');

$tagPriceOfferQWine = new TagContent('http://www.qwine.ch');
$tagPriceOfferQWine->build('span','class','qoqa-price');
$tagPriceOfferQWine->fetch();

$tagTitle_1_OfferQWine  = new TagContent('http://www.qwine.ch');
$tagTitle_1_OfferQWine ->build('span','class','brand');
$tagTitle_1_OfferQWine ->fetch();

$tagTitle_2_OfferQWine = new TagContent('http://www.qwine.ch');
$tagTitle_2_OfferQWine->build('span','class','name');
$tagTitle_2_OfferQWine->fetch();

/*QSPORT*/

$tagImgOfferQSport = new TagContent('http://www.qsport.ch');
$tagImgOfferQSport->build('img','id','showcase_media_DESKTOP_0');
$tagImgOfferQSport->fetch();
$tagImgOfferQSport->setStyle('width:50%;');

$tagPriceOfferQSport = new TagContent('http://www.qsport.ch');
$tagPriceOfferQSport->build('span','class','qoqa-price');
$tagPriceOfferQSport->fetch();

$tagTitle_1_OfferQSport = new TagContent('http://www.qsport.ch');
$tagTitle_1_OfferQSport ->build('span','class','brand');
$tagTitle_1_OfferQSport ->fetch();

$tagTitle_2_OfferQSport = new TagContent('http://www.qsport.ch');
$tagTitle_2_OfferQSport->build('span','class','name');
$tagTitle_2_OfferQSport->fetch();

/*QOOKING*/

$tagImgOfferQooking = new TagContent('http://www.qooking.ch');
$tagImgOfferQooking->build('img','id','showcase_media_DESKTOP_0');
$tagImgOfferQooking->fetch();
$tagImgOfferQooking->setStyle('width:50%;');

$tagPriceOfferQooking = new TagContent('http://www.qooking.ch');
$tagPriceOfferQooking->build('span','class','qoqa-price');
$tagPriceOfferQooking->fetch();

$tagTitle_1_OfferQooking = new TagContent('http://www.qooking.ch');
$tagTitle_1_OfferQooking ->build('span','class','brand');
$tagTitle_1_OfferQooking ->fetch();

$tagTitle_2_OfferQooking = new TagContent('http://www.qooking.ch');
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