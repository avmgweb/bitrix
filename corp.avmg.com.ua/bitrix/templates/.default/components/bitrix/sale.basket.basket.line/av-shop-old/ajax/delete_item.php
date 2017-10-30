<?
use
	\Bitrix\Main\Loader,
	\Bitrix\Sale\Basket,
	\Bitrix\Sale\Fuser;

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!Loader::includeModule("sale"))                              die();
if(!Loader::includeModule("catalog"))                           die();
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$siteId          = $_POST["site_id"];
$elementId       = (int) $_POST["element_id"];
$basket          = $siteId               ? Basket::loadItemsForFUser(Fuser::getId(), $siteId) : null;
$elementInBasket = $basket && $elementId ? $basket->getItemById($elementId)                   : null;
$result          = 'error';
/* -------------------------------------------------------------------- */
/* ------------------------- remove position -------------------------- */
/* -------------------------------------------------------------------- */
if($elementInBasket)
	{
	$elementInBasket->delete();
	$basket->save();
	$result = 'deleted';
	}
elseif($elementId)
	$result = 'unfounded';
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
echo json_encode
	([
	"element_id" => $elementId,
	"result"     => $result
	]);