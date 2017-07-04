<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die()?>
<div class="av-form-select-multiple">
	<div><?=$arResult["TITLE"]?></div>
	<div>
		<?foreach($arResult["LIST"] as $value => $title):?>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.checkbox", "av",
					[
					"NAME"    => $arResult["NAME"],
					"VALUE"   => $value,
					"CHECKED" => in_array($value, $arResult["VALUE"]) ? 'Y' : 'N',
					"TITLE"   => $title
					]
				);
			?>
		</div>
		<?endforeach?>
	</div>
</div>