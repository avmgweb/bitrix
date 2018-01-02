<?
use \Bitrix\Main\Page\Asset;

include_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/urlrewrite.php";
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Сторінка не знайдена");

Asset::getInstance()->addCss("/bitrix/css/av-site/pages/404.css");
?>
<div class="av-404-page">
	<b>404</b>
	<i>Сторінка не знайдена</i>
	<div>
		Ми не можемо знайти сторінку, яку ви шукали.<br>
		Спробуйте повернутися на попередню сторінку або перейти на головну.
	</div>

	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-alt",
				[
				"BUTTON_TYPE" => "label",
				"TITLE"       => "Попередня сторінка",
				"ATTR"        => ["onclick" => "parent.history.back()"]
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				[
				"BUTTON_TYPE" => "link",
				"TITLE"       => "На головну",
				"LINK"        => "/"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>