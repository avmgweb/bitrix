<?
use \Bitrix\Main\Page\Asset;

include_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/urlrewrite.php";
CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");
require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Страница не найдена");
Asset::getInstance()->addCss("/bitrix/css/av-site/pages/404.css");
?>
<div class="av-404-page">
	<b>404</b>
	<i>Страница не найдена</i>
	<div>
		Мы не можем найти страницу, которую вы искали.<br>
		Попробуйте вернуться на предыдущую страницу или перейти на главную.
	</div>

	<div class="buttons-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-alt",
				[
				"BUTTON_TYPE" => "label",
				"TITLE"       => "Предыдущая страница",
				"ATTR"        => ["onclick" => "parent.history.back()"]
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				[
				"BUTTON_TYPE" => "link",
				"TITLE"       => "На главную",
				"LINK"        => "/"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>