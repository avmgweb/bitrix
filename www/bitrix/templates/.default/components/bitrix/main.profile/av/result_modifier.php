<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arResult["USER_PHOTO_URL"] = "";
if($arResult["arUser"]["PERSONAL_PHOTO"])
	$arResult["USER_PHOTO_URL"] = CFile::GetPath($arResult["arUser"]["PERSONAL_PHOTO"]);