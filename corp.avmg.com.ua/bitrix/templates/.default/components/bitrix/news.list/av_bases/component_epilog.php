<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;

CJSCore::Init(["av_site"]);
Asset::getInstance()->addJs('https://maps.googleapis.com/maps/api/js?key='.COption::GetOptionString("fileman", "google_map_api_key").'&callback=initMap');