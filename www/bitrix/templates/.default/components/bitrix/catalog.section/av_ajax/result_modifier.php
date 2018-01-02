<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

$arParams["PAGE_TYPE"] = in_array($arParams["PAGE_TYPE"], ["tablet", "list"]) ? $arParams["PAGE_TYPE"] : "tablet";