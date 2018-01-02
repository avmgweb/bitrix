<?
use \Bitrix\Main\Page\Asset;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("Партнерство");
$APPLICATION->SetPageProperty("title",       "Співпраця з компанією АВ метал груп | Партнерська програма Україна: Дніпро, Київ, Харків, Львів, Одеса, ☎ (056) 790-01-22 | ™ avmg.com.ua");
$APPLICATION->SetPageProperty("description", "Співпраця з компанією АВ метал груп ™ ✓Вигідна партнерська програма ✓Широка регіональна мережа ☎ (056) 790-01-22 Телефонуйте!");

CJSCore::Init(["bootstrap"]);
Asset::getInstance()->addCss("/bitrix/css/av-site/pages/partners.css");
?>
<div class="row">
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 av-parthners-page-block first-column">
		<h3>Партнерська програма</h3>
		<p>
			Однією з основних завдань компанії АВ метал груп є постійний розвиток дилерської регіональної мережі і залучення нових партнерів.
		</p>
		<p>
			Це стає можливим завдяки постійному розширенню філіальної мережі, товарного асортименту металопродукції на складах і розвитку додаткових сервісних послуг.
			У найкоротші терміни ми доставляємо власним автотранспортом металопрокат в будь-яку точку України.
		</p>
		<p>
			<a target="_blank" href="/">АВ метал груп</a> максимально відповідає вимогам наших клієнтів.
			Ми пропонуємо конкурентні ціни, оперативну доставку, інформаційну та технічну підтримку партнерів, гнучку систему знижок, відстрочення платежу і різні пільгові умови для постійних клієнтів.
		</p>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 av-parthners-page-block second-column">
		<h3>Переваги</h3>
		<p>
			Наш колектив - високопрофесійні і відповідальні менеджери, які постійно відстежують всі тенденції, що відбуваються на ринку металопрокату і пропонують цілий комплекс послуг з передпродажної підготовки, враховуючи всі потреби клієнта.
		</p>
		<p>
			Філії АВ метал груп працюють в найбільший містах України: Київ, Дніпро, Львів, Харків, Запоріжжя, Одеса, Миколаїв, Маріуполь, Вінниця, Житомир, Полтава, Кропивницький, Рівне, Суми, Хмельницький, Черкаси, Кам'янське, Мелітополь, Кривий Ріг.
			Роздрібні металобази розташовані більш ніж в 100 містах по всій території України.
		</p>
		<p>
			Швидкість і якість обслуговування - наші пріоритети.
			Дружна команда нашого колективу - це запорука успіху і просування бізнесу АВ метал груп, на який ми робимо ставку.
		</p>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 av-parthners-page-block">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:form.result.new", "av-parthners",
				array(
				"AJAX_MODE"              => "Y",
				"AJAX_OPTION_JUMP"       => "N",
				"AJAX_OPTION_STYLE"      => "N",
				"AJAX_OPTION_HISTORY"    => "N",

				"SEF_MODE"    => "N",
				"WEB_FORM_ID" => 37,

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
			)
		?>
	</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 av-page-title av-parthners-page-separator">Наші партнери</div>
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:image_carousel", "av-parthners",
				array(
				"IMAGE_URL" =>
					array(
					"/upload/av_site/partners/logo_DMKD.png",      "/upload/av_site/partners/logo_alchevsk.png",     "/upload/av_site/partners/logo_arcelormittal.png",
					"/upload/av_site/partners/logo_azovstal.png",  "/upload/av_site/partners/logo_celsa.png",        "/upload/av_site/partners/logo_dtz.png",
					"/upload/av_site/partners/logo_evraz.png",     "/upload/av_site/partners/logo_interpipe.png",    "/upload/av_site/partners/logo_kominmet.png",
					"/upload/av_site/partners/logo_trubostal.png", "/upload/av_site/partners/logo_zaporizhstal.png", "/upload/av_site/partners/logo_slavsant.jpg",
					"/upload/av_site/partners/logo_plasmatec.jpeg"
					),
				"IMAGE_NAME" =>
					array(
					"DMKD",       "Алчевський металургійний комбінат", "ArcelorMittal",
					"Azov Stal",  "Celsa",                             "ПАТ ДТЗ",
					"ЕВРАЗ",      "Interpipe",                         "Комінмет",
					"ТрубоСталь", "Запоріжсталь",                      "Славсант",
					"PlasmaTec"
					),
				"IMAGE_ALT"  =>
					array(
					"DMKD",       "Алчевський металургійний комбінат", "ArcelorMittal",
					"Azov Stal",  "Celsa",                             "ПАТ ДТЗ",
					"ЕВРАЗ",      "Interpipe",                         "Комінмет",
					"ТрубоСталь", "Запоріжсталь",                      "Славсант",
					"PlasmaTec"
					)
				)
			);
		?>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>