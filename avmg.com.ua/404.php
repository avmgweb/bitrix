<?
define("ERROR_404", "Y");
require $_SERVER["DOCUMENT_ROOT"].'/bitrix/header.php';

$APPLICATION->SetTitle("Сторінка не знайдена");
$APPLICATION->SetAdditionalCSS('/bitrix/css/av_site/pages/404.css');
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
			"av:form.button", "av_alt",
				[
				"BUTTON_TYPE" => 'label',
				"TITLE"       => 'Попередня сторінка',
				"ATTR"        => ["onclick" => 'parent.history.back()']
				]
			);
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				[
				"BUTTON_TYPE" => 'link',
				"TITLE"       => 'На головну',
				"LINK"        => '/'
				]
			);
		?>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"].'/bitrix/footer.php'?>