<?
use
	Bitrix\Sale\Basket,
	Bitrix\Sale\Fuser;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$basket                     = Basket::loadItemsForFUser(Fuser::getId(), SITE_ID);
$productsArray              = [];
$productsMeasure            = [];
$measureTitles              = [];
$arResult["ITEMS"]          = [];
$arResult["TOTAL_PRICE"]    = 0;
$arParams["ITEMS_VIEW_MAX"] = 10;
/* -------------------------------------------------------------------- */
/* ---------------------------- items query --------------------------- */
/* -------------------------------------------------------------------- */
foreach($basket->getOrderableItems() as $basketItem)
	{
	$arResult["ITEMS"][] =
		[
		"ID"         => $basketItem->getField("ID"),
		"PRODUCT_ID" => $basketItem->getField("PRODUCT_ID"),
		"NAME"       => $basketItem->getField("NAME"),
		"QUANTITY"   => round($basketItem->getField("QUANTITY"), 2)
		];

	$productsArray[] = $basketItem->getField("PRODUCT_ID");
	$arResult["TOTAL_PRICE"] += $basketItem->getField("PRICE") * $basketItem->getField("QUANTITY");
	}
/* -------------------------------------------------------------------- */
/* --------------------------- mesures query -------------------------- */
/* -------------------------------------------------------------------- */
if(count($productsArray))
	{
	$queryList = CCatalogProduct::GetList([], ["ID" => $productsArray], false, false, ["ID", "MEASURE"]);
	while($queryElement = $queryList->GetNext()) $productsMeasure[$queryElement["ID"]] = $queryElement["MEASURE"];
	}
if(count($productsMeasure))
	{
	$queryList = CCatalogMeasure::GetList([], ["ID" => array_values($productsMeasure)], false, false, ["ID", "SYMBOL_RUS"]);
	while($queryElement = $queryList->GetNext()) $measureTitles[$queryElement["ID"]] = $queryElement["SYMBOL_RUS"];
	}
foreach($arResult["ITEMS"] as $index => $itemInfo)
	$arResult["ITEMS"][$index]["MEASURE"] = $measureTitles[$productsMeasure[$itemInfo["PRODUCT_ID"]]];
/* -------------------------------------------------------------------- */
/* ----------------------- total price convert ------------------------ */
/* -------------------------------------------------------------------- */
if($arResult["TOTAL_PRICE"])
	$arResult["TOTAL_PRICE"] = CurrencyFormat
		(
		round($arResult["TOTAL_PRICE"], 2) ,
		CCurrency::GetBaseCurrency()
		);
/* -------------------------------------------------------------------- */
/* ---------------------- items max view convert ---------------------- */
/* -------------------------------------------------------------------- */
$arResult["ITEMS_VIEW_MORE"] = false;
if(count($arResult["ITEMS"]) > $arParams["ITEMS_VIEW_MAX"])
	{
	$arResult["ITEMS_VIEW_MORE"] = true;
	$arResult["ITEMS"] = array_slice($arResult["ITEMS"], 0, $arParams["ITEMS_VIEW_MAX"]);
	}