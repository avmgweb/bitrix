<?
use \Bitrix\Main\Localization\Loc;

if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ----------------------------- sku table ---------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["OFFERS"])):?>
	<thead>
		<tr>
			<?foreach($arResult["SHOW_OFFERS_FIELDS"] as $offerField => $title):?>
			<th><?=$title?></th>
			<?endforeach?>

			<?foreach($arResult["SHOW_OFFERS_PROPS"] as $offerProp => $title):?>
			<th><?=$title?></th>
			<?endforeach?>

			<th><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_COUNT")?></th>
			<th><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_MEASURE")?></th>
			<th><?=$arResult["OFFERS"][0]["CATALOG_GROUP_NAME_1"]?></th>
			<th><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_BUY")?></th>
		</tr>
	</thead>

	<tbody>
		<?foreach($arResult["OFFERS"] as $valueInfo):?>
			<?$itemPrice = $valueInfo["PRICES"][$arParams["PRICE_TYPE"]]["PRINT_DISCOUNT_VALUE_NOVAT"]?>
			<tr
				class="
					item-row
					<?if(count($arResult["USER_BASKET"][$valueInfo["ID"]])):?>
					checked
					<?endif?>
					"
				data-element-id="<?=$valueInfo["ID"]?>"
				data-element-name="<?=$valueInfo["NAME"]?>"
				data-iblock-id="<?=$valueInfo["IBLOCK_ID"]?>"
			>
				<?foreach($arResult["SHOW_OFFERS_FIELDS"] as $offerField => $title):?>
				<td><?=$valueInfo[$offerField]?></td>
				<?endforeach?>

				<?foreach($arResult["SHOW_OFFERS_PROPS"] as $offerProp => $title):?>
				<td>
					<?if(in_array($valueInfo["DISPLAY_PROPERTIES"][$offerProp]["PROPERTY_TYPE"], ["N", "S", "L", "E"])):?>
					<?=strip_tags($valueInfo["DISPLAY_PROPERTIES"][$offerProp]["DISPLAY_VALUE"])?>
					<?endif?>
				</td>
				<?endforeach?>

				<td>
					<?$positionQuantity = (float) $arResult["USER_BASKET"][$valueInfo["ID"]]["QUANTITY"]?>
					<div class="counter<?if($positionQuantity):?> disabled<?endif?>">
						<div class="checker back<?if($positionQuantity <= 1):?> disabled<?endif?>"></div>
						<input value="<?=($positionQuantity ? $positionQuantity : 1)?>" <?if($positionQuantity):?>disabled<?endif?>>
						<div class="checker forward"></div>
					</div>
				</td>

				<td>
					<div class="measure"><?=$valueInfo["ITEM_MEASURE"]["TITLE"]?></div>
				</td>

				<td>
					<?if($itemPrice):?><?=$itemPrice?>
					<?else:?><span class="ask-price-call-form"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_ASK_PRICE")?></span>
					<?endif?>
				</td>

				<td>
					<?if($itemPrice):?>
						<div class="buy-block">
							<div class="check"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHECK")?></div>
							<div class="checked"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHECKED")?></div>
							<div class="change"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHANGE")?></div>
							<div class="empty-alert"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_EMPTY_ALERT")?></div>
						</div>
					<?else:?>
						-
					<?endif?>
				</td>
			</tr>
		<?endforeach?>
	</tbody>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- element table -------------------------- */
/* -------------------------------------------------------------------- */
?>
<?else:?>
	<?$elementPrice = $arResult["PRICES"][$arParams["PRICE_TYPE"]]["PRINT_DISCOUNT_VALUE_NOVAT"]?>
	<thead>
		<tr>
			<?foreach($arResult["SHOW_ELEMENT_FIELDS"] as $elementProp => $title):?>
			<th><?=$title?></th>
			<?endforeach?>

			<th><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_COUNT")?></th>
			<th><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_MEASURE")?></th>
			<th><?=$arResult["CAT_PRICES"][$arParams["PRICE_TYPE"]]["TITLE"]?></th>
			<th><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_BUY")?></th>
		</tr>
	</thead>

	<tbody>
		<tr
			class="
				item-row
				<?if(count($arResult["USER_BASKET"][$arResult["ID"]])):?>
				checked
				<?endif?>
				"
			data-element-id="<?=$arResult["ID"]?>"
			data-element-name="<?=$arResult["NAME"]?>"
			data-iblock-id="<?=$arResult["IBLOCK_ID"]?>"
		>
			<?foreach($arResult["SHOW_ELEMENT_FIELDS"] as $elementProp => $title):?>
			<td>
				<?if(in_array($arResult["DISPLAY_PROPERTIES"][$elementProp]["PROPERTY_TYPE"], ["N", "S", "L", "E"])):?>
				<?=strip_tags($arResult["DISPLAY_PROPERTIES"][$elementProp]["DISPLAY_VALUE"])?>
				<?endif?>
			</td>
			<?endforeach?>

			<td>
				<?$positionQuantity = (float) $arResult["USER_BASKET"][$arResult["ID"]]["QUANTITY"]?>
				<div class="counter<?if($positionQuantity):?> disabled<?endif?>">
					<div class="checker back<?if($positionQuantity <= 1):?> disabled<?endif?>"></div>
					<input value="<?=($positionQuantity ? $positionQuantity : 1)?>" <?if($positionQuantity):?>disabled<?endif?>>
					<div class="checker forward"></div>
				</div>
			</td>

			<td>
				<div class="measure"><?=$arResult["ITEM_MEASURE"]["TITLE"]?></div>
			</td>

			<td>
				<?if($elementPrice):?><?=$elementPrice?>
				<?else:?><span class="ask-price-call-form"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_ASK_PRICE")?></span>
				<?endif?>
			</td>

			<td>
				<?if($elementPrice):?>
					<div class="buy-block">
						<div class="check"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHECK")?></div>
						<div class="checked"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHECKED")?></div>
						<div class="change"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_CHANGE")?></div>
						<div class="empty-alert"><?=Loc::getMessage("AV_CATALOG_ELEMENT_INFO_TABLE_EMPTY_ALERT")?></div>
					</div>
				<?else:?>
					-
				<?endif?>
			</td>
		</tr>
	</tbody>
<?endif?>