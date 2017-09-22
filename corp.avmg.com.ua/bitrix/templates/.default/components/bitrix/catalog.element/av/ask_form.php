<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die()?>
<div class="form-name"></div>
<div class="separator"></div>
<div class="form-body">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:form.result.new", "av_ajax",
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