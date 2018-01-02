<h3>Замовлення за телефоном:</h3>
<p>
	т. (056) 790-01-22<br>
	м. (097) 208-29-98
</p>
<ul>
	<li>Консультація і розрахунок вартості замовлення</li>
	<li>Індивідуальне замовлення виробів за кресленнями</li>
</ul><br>

<h3>Оформити заявку онлайн</h3>
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
		"WEB_FORM_ID" => 39,

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