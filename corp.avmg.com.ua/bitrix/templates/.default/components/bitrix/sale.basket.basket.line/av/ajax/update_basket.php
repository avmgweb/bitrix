<?
use \Bitrix\Main\Loader;

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!Loader::includeModule("sale"))                              die();
if(!Loader::includeModule("catalog"))                           die();
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$siteId            = $_POST["site_id"] ? $_POST["site_id"] : SITE_ID;
$basketOrdersCount = 0;
/* -------------------------------------------------------------------- */
/* --------------------------- basket query --------------------------- */
/* -------------------------------------------------------------------- */
$queryList = CSaleBasket::GetList
	(
	["ID" => 'DESC'],
		[
		"FUSER_ID" => CSaleBasket::GetBasketUserID(),
		"LID"      => $siteId,
		"ORDER_ID" => NULL
		],
	false, false, ["ID"]
	);
while($queryElement = $queryList->GetNext()) $basketOrdersCount++;
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<?=$basketOrdersCount?>
