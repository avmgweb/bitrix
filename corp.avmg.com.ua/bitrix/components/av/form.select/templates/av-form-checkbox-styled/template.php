<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-form-styled-select-checkbox<?if($arResult["REQUIRED"]):?> required<?endif?>">
	<label><?=$arResult["TITLE"]?></label>

	<?foreach($arResult["LIST"] as $value => $title):?>
	<div>
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.checkbox", "av-form",
				[
				"NAME"     => $arResult["NAME"]."[]",
				"VALUE"    => $value,
				"CHECKED"  => is_array($arResult["VALUE"]) && in_array($value, $arResult["VALUE"]) ? "Y" : "N",
				"TITLE"    => $title,
				"REQUIRED" => $arResult["REQUIRED"]
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
	<?endforeach?>
</div>