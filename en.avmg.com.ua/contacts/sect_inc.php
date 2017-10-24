<h3>Head office</h3>
<p>
	Ukraine, Dnepr,<br>
	Sholom-Aleikhema str., 5<br>
	+38 (056) 790-01-22<br>
	+38 (056) 790-73-00<br>
	e-mail: <a href="mailto:office@avmg.com.ua">office@avmg.com.ua</a>
</p>
<h3>Contact form</h3>
<?
$APPLICATION->IncludeComponent
	(
	"bitrix:form.result.new", "av",
		array(
		"AJAX_MODE"           => "Y",
		"AJAX_OPTION_JUMP"    => "N",
		"AJAX_OPTION_STYLE"   => "N",
		"AJAX_OPTION_HISTORY" => "N",

		"SEF_MODE"    => "N",
		"WEB_FORM_ID" => 48,

		"START_PAGE"     => "new",
		"SHOW_LIST_PAGE" => "N",
		"SHOW_EDIT_PAGE" => "N",
		"SHOW_VIEW_PAGE" => "N",
		"SUCCESS_URL"    => "",

		"SHOW_ANSWER_VALUE"      => "N",
		"SHOW_ADDITIONAL"        => "N",
		"SHOW_STATUS"            => "N",
		"EDIT_ADDITIONAL"        => "N",
		"EDIT_STATUS"            => "N",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"USE_EXTENDED_ERRORS"    => "N",

		"CACHE_TYPE" => "A",
		"CACHE_TIME" => 360000
		)
	);
?>