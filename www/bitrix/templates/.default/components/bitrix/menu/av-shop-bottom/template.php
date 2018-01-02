<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!count($arResult))                                           return;

    if($arParams["MAX_LEVEL"] == 1) include "one_level/template.php";
elseif($arParams["MAX_LEVEL"] == 2) include "two_level/template.php";
elseif($arParams["MAX_LEVEL"] == 3) include "three_level/template.php";