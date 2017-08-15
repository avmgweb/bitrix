<?
use \Bitrix\Main\Loader;

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!Loader::includeModule("sale"))                              die();
if(!Loader::includeModule("catalog"))                           die();
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$result            = 'error';
$elementId         = $_POST["element_id"];
$siteId            = $_POST["site_id"];
$newElementId      = 0;
$elementCount      = (float) $_POST["count"];
$elementInBasketId = $elementId
	? CSaleBasket::GetList
		(
		[],
			[
			"FUSER_ID"   => CSaleBasket::GetBasketUserID(),
			"LID"        => $siteId,
			"PRODUCT_ID" => $elementId
			],
		false, false, ["ID"]
		)->GetNext()["ID"]
	: 0;
/* -------------------------------------------------------------------- */
/* ---------------------- change position count ----------------------- */
/* -------------------------------------------------------------------- */
if($elementInBasketId && $elementCount)
	{
	$updateResult = CSaleBasket::Update($elementInBasketId, ["QUANTITY" => $elementCount]);
	if($updateResult) $result = 'position_changed';
	}
/* -------------------------------------------------------------------- */
/* ------------------------- remove position -------------------------- */
/* -------------------------------------------------------------------- */
elseif($elementInBasketId && !$elementCount)
	{
	$deleteResult = CSaleBasket::Delete($elementInBasketId);
	if($deleteResult) $result = 'position_removed';
	}
/* -------------------------------------------------------------------- */
/* --------------------------- add position --------------------------- */
/* -------------------------------------------------------------------- */
elseif($elementId && $elementCount)
	{
	$newElementId = Add2BasketByProductID($elementId, $elementCount, ["LID" => $siteId], []);
	if($newElementId) $result = 'position_add';
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
echo json_encode
	([
	"result"        => $result,
	"element_id"    => $elementId,
	"element_count" => $elementCount
	]);