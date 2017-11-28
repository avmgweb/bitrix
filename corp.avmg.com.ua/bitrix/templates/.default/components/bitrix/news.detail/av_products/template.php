<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$buttonsArray = CIBlock::GetPanelButtons
	(
	$arResult["IBLOCK_ID"],
	$arResult["ID"],
	0, ["SECTION_BUTTONS" => false, "SESSID" => false]
	);

$this->AddEditAction  ($arResult["ID"], $buttonsArray["edit"]["edit_element"]["ACTION_URL"],   CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arResult["ID"], $buttonsArray["edit"]["delete_element"]["ACTION_URL"], CIBlock::GetArrayByID($arResult["IBLOCK_ID"], "ELEMENT_DELETE"));
?>
<div class="av-news-detail-products" id="<?=$this->GetEditAreaId($arParams["ELEMENT_ID"])?>">
	<?
	/* ------------------------------------------- */
	/* ------------------ image ------------------ */
	/* ------------------------------------------- */
	?>
	<img
		class="main-image"
		src="<?=($arResult["DETAIL_PICTURE"]["SRC"] ? $arResult["DETAIL_PICTURE"]["SRC"] : $this->GetFolder()."/images/default_image.jpg")?>"
		alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
		title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
	>
	<?
	/* ------------------------------------------- */
	/* ------------------ info ------------------- */
	/* ------------------------------------------- */
	?>
	<div class="info-block">
		<div><?=$arResult["FIELDS"]["DETAIL_TEXT"]?></div>
		<div class="buttons-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av-alt",
					[
					"BUTTON_TYPE" => "link",
					"LINK"        => $arResult["LIST_PAGE_URL"],
					"TITLE"       => Loc::getMessage("AV_NEWS_DETAIL_PRODUCTS_BACK_LINK")
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			if($arResult["DISPLAY_PROPERTIES"]["LINKSHOP"]["VALUE"])
				$APPLICATION->IncludeComponent
					(
					"av:form.button", "av-alt",
						[
						"BUTTON_TYPE" => "link",
						"LINK"        => $arResult["DISPLAY_PROPERTIES"]["LINKSHOP"]["VALUE"],
						"TITLE"       => Loc::getMessage("AV_NEWS_DETAIL_PRODUCTS_SHOP_LINK"),
						"ATTR"        => ["target" => "_blank"]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
			foreach($arParams["ADDITIONAL_LINKS"] as $index => $link)
				$APPLICATION->IncludeComponent
					(
					"av:form.button", "av-alt",
						[
						"BUTTON_TYPE" => "link",
						"LINK"        => $link,
						"TITLE"       => $arParams["ADDITIONAL_LINKS_TITLES"][$index]
						],
					false, ["HIDE_ICONS" => "Y"]
					);
			?>
		</div>
	</div>
	<?
	/* ------------------------------------------- */
	/* ---------------- web form ----------------- */
	/* ------------------------------------------- */
	?>
	<?if($arParams["WEBFORM_ID"]):?>
	<div class="web-form">
		<h3><?=Loc::getMessage("AV_NEWS_DETAIL_PRODUCTS_FEADBACK_FORM")?></h3>
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:form.result.new", $arParams["WEBFORM_TEMPLATE"],
				[
				"AJAX_MODE"              => "Y",
				"AJAX_OPTION_JUMP"       => "N",
				"AJAX_OPTION_STYLE"      => "N",
				"AJAX_OPTION_HISTORY"    => "N",

				"SEF_MODE"               => "N",
				"VARIABLE_ALIASES"       => ["action" => "action"],

				"WEB_FORM_ID"            => $arParams["WEBFORM_ID"],
				"RESULT_ID"              => "",

				"START_PAGE"             => "new",
				"SHOW_LIST_PAGE"         => "N",
				"SHOW_EDIT_PAGE"         => "N",
				"SHOW_VIEW_PAGE"         => "N",
				"SUCCESS_URL"            => $APPLICATION->GetCurPage(false),

				"SHOW_ANSWER_VALUE"      => "N",
				"SHOW_ADDITIONAL"        => "N",
				"SHOW_STATUS"            => "N",
				"EDIT_ADDITIONAL"        => "N",
				"EDIT_STATUS"            => "N",
				"IGNORE_CUSTOM_TEMPLATE" => "N",
				"USE_EXTENDED_ERRORS"    => "N"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	<?endif?>
	</div>
</div>