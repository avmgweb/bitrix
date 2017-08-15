<?
use \Bitrix\Main\Loader;

require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
if(!Loader::includeModule("sale"))                              die();
if(!Loader::includeModule("catalog"))                           die();
/* -------------------------------------------------------------------- */
/* --------------------------- language files ------------------------- */
/* -------------------------------------------------------------------- */
$dirExplode = explode('/', __DIR__);
unset($dirExplode[count($dirExplode) - 1]);
include implode('/', $dirExplode).'/lang/'.LANGUAGE_ID.'/template.php';
/* -------------------------------------------------------------------- */
/* ----------------------------- variables ---------------------------- */
/* -------------------------------------------------------------------- */
$arResult = unserialize(base64_decode($_POST["params"]));
$arResult["BASKET_SALES"] = [];
$queryList = CSaleBasket::GetList
	(
	["ID" => 'DESC'],
		[
		"FUSER_ID" => CSaleBasket::GetBasketUserID(),
		"LID"      => $arResult["SITE"],
		"ORDER_ID" => NULL
		],
	false, false,
	["ID", "PRODUCT_ID", "QUANTITY"]
	);
while($queryElement = $queryList->GetNext()) $arResult["BASKET_SALES"][$queryElement["PRODUCT_ID"]] = $queryElement;
/* -------------------------------------------------------------------- */
/* --------------------------- offers table --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["OFFERS"])):?>
	<table class="av-catalog-element-sku-table" data-site-id="<?=$arResult["SITE"]?>">
		<thead>
			<tr>
				<?foreach($arParams["OFFERS_FIELD_CODE"] as $field):?>
				<th><?=GetMessage('AV_CATALOG_ELEMENT_INFO_TABLE_FIELD_'.$field)?></th>
				<?endforeach?>

				<?foreach($arParams["OFFERS_PROPERTY_CODE"] as $field):?>
				<th><?=$arResult["OFFERS"][0]["PROPERTIES"][$field]["NAME"]?></th>
				<?endforeach?>

				<th><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_COUNT")?></th>
				<th><?=$arResult["OFFERS"][0]["CATALOG_GROUP_NAME_1"]?></th>
				<th><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_BUY")?></th>
			</tr>
		</thead>

		<tbody>
			<?foreach($arResult["OFFERS"] as $valueInfo):?>
			<tr
				class="
					item-row
					<?if(count($arResult["BASKET_SALES"][$valueInfo["ID"]])):?>
					checked
					<?endif?>
					"
				data-element-id="<?=$valueInfo["ID"]?>"
			>
				<?foreach($arResult["OFFERS_FIELDS"] as $field):?>
				<td><?=$valueInfo[$field]?></td>
				<?endforeach?>

				<?foreach($arResult["OFFERS_PROPS"] as $field):?>
				<td>
					<?if(in_array($valueInfo["PROPERTIES"][$field]["PROPERTY_TYPE"], ["N", "S", "L"])):?>
					<?=$valueInfo["PROPERTIES"][$field]["VALUE"]?>
					<?endif?>
				</td>
				<?endforeach?>

				<td>
					<?if($valueInfo["PRICES"]["BASE"]["PRINT_VALUE_NOVAT"]):?>
						<input
							class="counter"
							value="<?=(count($arResult["BASKET_SALES"][$valueInfo["ID"]]) ? $arResult["BASKET_SALES"][$valueInfo["ID"]]["QUANTITY"] : 1)?>"
							<?if(count($arResult["BASKET_SALES"][$valueInfo["ID"]])):?>
							disabled
							<?endif?>
						>
						<?=$valueInfo["ITEM_MEASURE"]["TITLE"]?>
					<?else:?>
						-
					<?endif?>
				</td>
				<td>
					<?if($valueInfo["PRICES"]["BASE"]["PRINT_VALUE_NOVAT"]):?>
						<?=$valueInfo["PRICES"]["BASE"]["PRINT_VALUE_NOVAT"]?>
					<?else:?>
						<span class="ask-price-call-form"><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_ASK_PRICE")?></span>
					<?endif?>
				</td>
				<td>
					<?if($valueInfo["PRICES"]["BASE"]["PRINT_VALUE_NOVAT"]):?>
						<div class="check-block">
							<span><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHECK")?></span>
						</div>
						<div class="change-block">
							<span><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHECKED")?></span>
							<span><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHANGE")?></span>
						</div>
					<?else:?>
						-
					<?endif?>
				</td>
			</tr>
			<?endforeach?>
		</tbody>
	</table>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- element table -------------------------- */
/* -------------------------------------------------------------------- */
?>
<?elseif(count($arResult["ELEMENT_INFO"])):?>
	<table class="av-catalog-element-sku-table" data-site-id="<?=$arResult["SITE"]?>">
		<thead>
			<tr>
				<?foreach($arResult["ELEMENT_PROPS"] as $propInfo):?>
				<th><?=$propInfo["NAME"]?></th>
				<?endforeach?>

				<th><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_COUNT")?></th>
				<th><?=$arResult["ELEMENT_INFO"]["PRICE_TITLE"]?></th>
				<th><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_BUY")?></th>
			</tr>
		</thead>

		<tbody>
			<tr
				class="
					item-row
					<?if(count($arResult["BASKET_SALES"][$arResult["ELEMENT_INFO"]["ID"]])):?>
					checked
					<?endif?>
					"
				data-element-id="<?=$arResult["ELEMENT_INFO"]["ID"]?>"
			>
				<?foreach($arResult["ELEMENT_PROPS"] as $propInfo):?>
				<td>
					<?if(in_array($propInfo["PROPERTY_TYPE"], ["N", "S", "L"])):?>
						<?=$propInfo["VALUE"]?>
					<?endif?>
				</td>
				<?endforeach?>

				<td>
					<?if($arResult["ELEMENT_INFO"]["PRICE"]):?>
						<input
							class="counter"
							value="<?=(count($arResult["BASKET_SALES"][$arResult["ELEMENT_INFO"]["ID"]]) ? $arResult["BASKET_SALES"][$arResult["ELEMENT_INFO"]["ID"]]["QUANTITY"] : 1)?>"
							<?if(count($arResult["BASKET_SALES"][$arResult["ELEMENT_INFO"]["ID"]])):?>
							disabled
							<?endif?>
						>
						<?=$arResult["ELEMENT_INFO"]["MEASURE"]?>
					<?else:?>
						-
					<?endif?>
				</td>
				<td>
					<?if($arResult["ELEMENT_INFO"]["PRICE"]):?>
						<?=$arResult["ELEMENT_INFO"]["PRICE"]?>
					<?else:?>
						<span class="ask-price-call-form"><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_ASK_PRICE")?></span>
					<?endif?>
				</td>
				<td>
					<?if($arResult["ELEMENT_INFO"]["PRICE"]):?>
						<div class="check-block">
							<span><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHECK")?></span>
						</div>
						<div class="change-block">
							<span><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHECKED")?></span>
							<span><?=GetMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHANGE")?></span>
						</div>
					<?else:?>
						-
					<?endif?>
				</td>
			</tr>
		</tbody>
	</table>
<?endif?>