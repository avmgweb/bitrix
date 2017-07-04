<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* --------------------------------------------------------------------- */
/* ------------------------------- params ------------------------------ */
/* --------------------------------------------------------------------- */
$arResult["REQUIRED"] = $arParams["REQUIRED"] == 'Y' ? true : false;
$arResult["DISABLED"] = $arParams["DISABLED"] == 'Y' ? true : false;

$arResult["NAME"]  = substr($arParams["NAME"], strlen($arParams["NAME"]) - 2) == '[]' ? $arParams["NAME"] : $arParams["NAME"].'[]';
$arResult["TITLE"] = html_entity_decode($arParams["TITLE"]);
$arResult["VALUE"] = is_array($arParams["VALUE"]) ? $arParams["VALUE"] : [$arParams["VALUE"]];
$arResult["LIST"]  = is_array($arParams["LIST"])  ? $arParams["LIST"]  : [];
/* --------------------------------------------------------------------- */
/* ------------------------------- output ------------------------------ */
/* --------------------------------------------------------------------- */
$this->IncludeComponentTemplate();