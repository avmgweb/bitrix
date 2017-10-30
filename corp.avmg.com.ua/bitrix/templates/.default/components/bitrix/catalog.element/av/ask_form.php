<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die()?>
<div
	class="av-catalog-element-ask-form-origin"
	 data-link-field-id="<?=($arParams["ASK_FORM_LINK_FIELD_ID"]  ? $arParams["ASK_FORM_LINK_FIELD_ID"]  : 0)?>"
	 data-name-field-id="<?=($arParams["ASK_FORM_NAME_FIELD_ID"]  ? $arParams["ASK_FORM_NAME_FIELD_ID"]  : 0)?>"
	data-count-field-id="<?=($arParams["ASK_FORM_COUNT_FIELD_ID"] ? $arParams["ASK_FORM_COUNT_FIELD_ID"] : 0)?>"
	data-element-link-template="<?=CURRENT_PROTOCOL?>://<?=$_SERVER["SERVER_NAME"]?>/bitrix/admin/iblock_element_edit.php?IBLOCK_ID=#IBLOCK_ID#&type=<?=$arParams["IBLOCK_TYPE"]?>&ID=#ELEMENT_ID#"
>
	<div class="close"></div>
	<div class="title"></div>
	<div class="separator"></div>
	<div class="body">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:form.result.new", "av-ajax",
				[
				"AJAX_MODE"           => 'N',
				"AJAX_OPTION_JUMP"    => 'N',
				"AJAX_OPTION_STYLE"   => 'N',
				"AJAX_OPTION_HISTORY" => 'N',

				"SEF_MODE"    => 'N',
				"WEB_FORM_ID" => $arParams["ASK_FORM_ID"],

				"START_PAGE"     => 'new',
				"SHOW_LIST_PAGE" => 'N',
				"SHOW_EDIT_PAGE" => 'N',
				"SHOW_VIEW_PAGE" => 'N',
				"SUCCESS_URL"    => '',

				"SHOW_ANSWER_VALUE"      => 'N',
				"SHOW_ADDITIONAL"        => 'N',
				"SHOW_STATUS"            => 'N',
				"EDIT_ADDITIONAL"        => 'N',
				"EDIT_STATUS"            => 'N',
				"IGNORE_CUSTOM_TEMPLATE" => 'N',
				"USE_EXTENDED_ERRORS"    => 'N',

				"CACHE_TYPE" => 'N',
				"CACHE_TIME" => ''
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
</div>