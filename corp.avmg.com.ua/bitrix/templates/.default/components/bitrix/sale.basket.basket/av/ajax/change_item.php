<?
use
	\Bitrix\Main\Application,
	\Bitrix\Main\Loader,
	\Bitrix\Sale\Basket,
	\Bitrix\Sale\Fuser;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!Loader::includeModule("sale"))                              die();
if(!Loader::includeModule("catalog"))                           die();
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$request            = Application::getInstance()->getContext()->getRequest();
$basketItemId       = (int) $request->getPost("itemId");
$basketItemQuantity = (int) $request->getPost("quantity");
$siteId             = $request->getPost("siteId");
$basketObject       = NULL;
$basketItemObject   = NULL;
$operationType      = $request->getPost("operationType");
$resultOutput       =
	[
	"result" => "error",
	"itemId" => 0
	];

if($siteId)                        $basketObject     = Basket::loadItemsForFUser(Fuser::getId(), $siteId);
if($basketObject && $basketItemId) $basketItemObject = $basketObject->getItemById($basketItemId);
/* -------------------------------------------------------------------- */
/* ------------------------- change quantity -------------------------- */
/* -------------------------------------------------------------------- */
if($basketItemObject && $operationType == "changeQuantity" && $basketItemQuantity)
	{
	$basketItemObject->setField("QUANTITY", $basketItemQuantity);
	$basketObject->save();
	$resultOutput["result"] = "quantityChanged";
	$resultOutput["itemId"] = $basketItemObject->getField("ID");
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ delete ------------------------------ */
/* -------------------------------------------------------------------- */
elseif($basketItemObject && $operationType == "delete")
	{
	$basketItemObject->delete();
	$basketObject->save();
	$resultOutput["result"] = "deleted";
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ delay ------------------------------- */
/* -------------------------------------------------------------------- */
elseif($basketItemObject && $operationType == "delay" && $basketItemObject->getField("DELAY") != "Y")
	{
	$basketItemObject->setField("DELAY", "Y");
	$basketObject->save();
	$resultOutput["result"] = "delayed";
	$resultOutput["itemId"] = $basketItemObject->getField("ID");
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ return ------------------------------ */
/* -------------------------------------------------------------------- */
elseif($basketItemObject && $operationType == "return" && $basketItemObject->getField("DELAY") == "Y")
	{
	$sameProductItemObject = NULL;
	foreach($basketObject->getOrderableItems() as $object)
		if($object->getField("PRODUCT_ID") == $basketItemObject->getField("PRODUCT_ID"))
			{
			$sameProductItemObject = $object;
			break;
			}

	if($sameProductItemObject)
		{
		$sameProductItemObject->setField
			(
			"QUANTITY",
			$sameProductItemObject->getField("QUANTITY") + $basketItemObject->getField("QUANTITY")
			);
		$basketItemObject->delete();
		$resultOutput["itemId"] = $sameProductItemObject->getField("ID");
		}
	else
		{
		$basketItemObject->setField("DELAY", "N");
		$resultOutput["itemId"] = $basketItemObject->getField("ID");
		}

	$basketObject->save();
	$resultOutput["result"] = "returned";
	}
/* -------------------------------------------------------------------- */
/* ------------------------------ output ------------------------------ */
/* -------------------------------------------------------------------- */
echo json_encode($resultOutput);