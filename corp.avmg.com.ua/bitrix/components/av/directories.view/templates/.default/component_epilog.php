<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if($arResult["ELEMENT_INFO"]["NAME"])
	$GLOBALS["APPLICATION"]->AddChainItem($arResult["ELEMENT_INFO"]["NAME"]);

AvComponentsIncludings::getInstance()->setIncludings("av", "form.button", "av_alt");