<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init(["av"]);
Asset::getInstance()->addJs('https://maps.googleapis.com/maps/api/js?key='.COption::GetOptionString("fileman", "google_map_api_key").'&callback=initMap');