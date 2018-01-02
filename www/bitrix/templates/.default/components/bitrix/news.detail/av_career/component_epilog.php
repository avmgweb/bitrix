<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);

AvComponentsIncludings::getInstance()
	->setIncludings("bitrix", "news.list",       "av_career_same_articles")
	->setIncludings("bitrix", "main.share",      $arParams["SHARE_TEMPLATE"])
	->setIncludings("bitrix", "form.result.new", $arParams["WEBFORM_TEMPLATE"])
	->setIncludings("av",     "form.button",     "av-alt");