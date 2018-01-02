<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div class="av-certificates-detail">
	<img
		src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
		title="<?=$arItem["DETAIL_PICTURE"]["TITLE"]?>"
		alt="<?=$arItem["DETAIL_PICTURE"]["ALT"]?>"
	>

	<div class="content">
		<div class="date"><?=explode(' ', $arResult["DATE_CREATE"])[0]?></div>
		<div class="name"><?=$arResult["NAME"]?></div>
		<div class="text"><?=strip_tags($arResult["DETAIL_TEXT"], '<br>')?></div>
	</div>

	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-alt",
				[
				"BUTTON_TYPE" => 'label',
				"TITLE"       => Loc::getMessage("AV_CERTIFICATES_DETAIL_CLOSE"),
				"ATTR"        => $arParams["CLOSE_FORM_ATTR"]
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		if($arResult["DETAIL_PICTURE"]["SRC"])
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					[
					"BUTTON_TYPE" => 'link',
					"TITLE"       => Loc::getMessage("AV_CERTIFICATES_DETAIL_UPLOAD"),
					"LINK"        => $arResult["DETAIL_PICTURE"]["SRC"],
					"ATTR"        => 'download target=_blank'
					],
				false, ["HIDE_ICONS" => 'Y']
				);
		?>
	</div>
</div>