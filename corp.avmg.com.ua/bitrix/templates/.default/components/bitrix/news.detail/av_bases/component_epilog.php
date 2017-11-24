<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av", "font_awesome"]);
Asset::getInstance()->addJs('https://maps.googleapis.com/maps/api/js?key='.COption::GetOptionString("fileman", "google_map_api_key").'&callback=initMap');

AvComponentsIncludings::getInstance()
	->setIncludings("bitrix", "news.list",   "av_bases_same_bases")
	->setIncludings("bitrix", "main.share",  "av")
	->setIncludings("av",     "form.button", "av-alt");