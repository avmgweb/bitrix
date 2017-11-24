<?
use \Bitrix\Main\Page\Asset;

require $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php";

$APPLICATION->SetTitle("АВ метал груп - корпоративний сайт компанії");
$APPLICATION->SetPageProperty("title",       "АВ метал груп провідна компанія України на ринку металопрокату | Офіційний сайт avmg.com.ua ✔ Адреса м. Дніпро, вул. Шолом-Алейхема, 5 ☎ Телефон (056) 790-01-22");
$APPLICATION->SetPageProperty("description", "АВ метал груп ™ найбільший металотрейдер України ✔ м. Дніпро, вул. Шолом-Алейхема, 5 Телефонуйте! ☎ (056)790-01-22");

CJSCore::Init(["bootstrap"]);
Asset::getInstance()->addCss("/bitrix/css/av-site/pages/index.css");
/* -------------------------------------------------------------------- */
/* ------------------------------ banner ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-banner-wraper">
	<?
	$APPLICATION->IncludeComponent
		(
		"bitrix:advertising.banner", "av",
			array(
			"TYPE"     => "MAIN_CORP_SITE",
			"NOINDEX"  => "Y",
			"QUANTITY" => 12,

			"CACHE_TYPE" => "A",
			"CACHE_TIME" => 360000
			)
		);
	?>
</div>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- main streams --------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
	<div class="container">
		<a class="av-page-title av-index-title-link" href="/products/">Основні напрямки</a>
		<?
		$APPLICATION->IncludeComponent
			(
			"av:visit_site.menu.tablet", "",
				array(
				"MENU_PATH"   => "/products/",
				"MENU_TYPE"   => "left",
				"MENU_VALUES" => array("/products/black-metal/", "/products/stainless-steel-metal/", "/products/galvanized-metal/", "/products/ironwares/", "/products/profnastil-metallocherepitsa/", "/products/building-hardware/", "/products/elektrody-svarochnye/", "/products/plenka-i-upakovka/", "/products/setka/")
				)
			);
		?>
		<div class="active-button-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					array(
					"BUTTON_TYPE" => "link",
					"LINK"        => "/products/",
					"TITLE"       => "Усі напрямки",
					"ATTR"        => ["rel" => "nofollow"]
					),
				false, array("HIDE_ICONS" => "Y")
				);
			?>
		</div>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------ tablets ----------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
	<div class="av-index-products-block">
		<div>
			<picture>
				<source srcset="/upload/av_site/index/proizvodstvo.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/proizvodstvo_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/proizvodstvo_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/proizvodstvo.jpg" alt="Виробництво" title="Виробництво">
			</picture>
			<a href="/proizvodstvo/">Виробництво</a>
		</div>
		<div>
			<picture>
				<source srcset="/upload/av_site/index/uslugi.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/uslugi_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/uslugi_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/uslugi.jpg" alt="Послуги" title="Послуги">
			</picture>
			<a href="/uslugi/">Послуги</a>
		</div>
		<div>
			<picture>
				<source srcset="/upload/av_site/index/partnerstvo.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/partnerstvo_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/partnerstvo_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/partnerstvo.jpg" alt="Партнерство" title="Партнерство">
			</picture>
			<a href="/about/partnersavmg/">Партнерство</a>
		</div>
		<div>
			<picture>
				<source srcset="/upload/av_site/index/kariera.jpg"     media="(min-width: 992px)">
				<source srcset="/upload/av_site/index/kariera_med.jpg" media="(min-width: 768px) and (max-width: 991px)">
				<source srcset="/upload/av_site/index/kariera_sm.jpg"  media="(max-width: 767px)">
				<img src="/upload/av_site/index/kariera.jpg" alt="Кар’єра" title="Кар’єра">
			</picture>
			<a href="/career/">Кар’єра</a>
		</div>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- bases ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
	<div class="container av-index-bases-block">
		<a class="av-page-title av-index-title-link" href="/metallobaza/">Філії та металобази</a>
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:catalog.section.list", "av_bases_map",
				array(
				"VIEW_MODE"        => "",
				"SHOW_PARENT_NAME" => "",

				"IBLOCK_TYPE"  => "av_storages_ua",
				"IBLOCK_ID"    => 134,
				"SECTION_ID"   => "",
				"SECTION_CODE" => "",

				"SECTION_URL" => "/metallobaza/#CODE#/",

				"COUNT_ELEMENTS"      => "Y",
				"TOP_DEPTH"           => 1,
				"SECTION_FIELDS"      => array(),
				"SECTION_USER_FIELDS" => array(),

				"CACHE_TYPE"   => "A",
				"CACHE_TIME"   => 360000,
				"CACHE_GROUPS" => "Y",

				"ADD_SECTIONS_CHAIN" => "N",

				"SUBSECTION_MAX_COUNT"   => 5,
				"SUBSECTION_SORT_BY"     => "ID",
				"SUBSECTION_SORT_ORDER"  => "DESC",
				"SUBSECTION_SORT_BY2"    => "NAME",
				"SUBSECTION_SORT_ORDER2" => "ASC",
				"SUBSECTION_URL"         => "#SUBSECTION_CODE#/"
				)
			);
		?>
		<div class="active-button-cell">
			<?
			$APPLICATION->IncludeComponent
				(
				"av:form.button", "av",
					array(
					"BUTTON_TYPE" => "link",
					"LINK"        => "/metallobaza/",
					"TITLE"       => "Переглянути усі",
					"ATTR"        => ["rel" => "nofollow"]
					),
				false, array("HIDE_ICONS" => "Y")
				);
			?>
		</div>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- blog ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block dark">
	<a class="av-page-title av-index-title-link" href="/about/blog/">Блог</a>
	<div class="blog-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:news.list", "av_blog_index",
				array(
				"AJAX_MODE"           => "N",
				"AJAX_OPTION_JUMP"    => "",
				"AJAX_OPTION_STYLE"   => "",
				"AJAX_OPTION_HISTORY" => "",

				"IBLOCK_TYPE" => "news",
				"IBLOCK_ID"   => 61,
				"NEWS_COUNT"  => 4,

				"SORT_BY1"      => "ACTIVE_FROM",
				"SORT_ORDER1"   => "DESC",
				"SORT_BY2"      => "NAME",
				"SORT_ORDER2"   => "ASC",
				"FILTER_NAME"   => "",
				"FIELD_CODE"    => "",
				"PROPERTY_CODE" => "",
				"CHECK_DATES"   => "",

				"DETAIL_URL" => "/about/blog/#ELEMENT_CODE#/",

				"PREVIEW_TRUNCATE_LEN"      => "",
				"ACTIVE_DATE_FORMAT"        => "",
				"SET_TITLE"                 => "N",
				"SET_BROWSER_TITLE"         => "N",
				"SET_META_KEYWORDS"         => "N",
				"SET_META_DESCRIPTION"      => "N",
				"SET_LAST_MODIFIED"         => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN"        => "N",
				"HIDE_LINK_WHEN_NO_DETAIL"  => "N",
				"PARENT_SECTION"            => "",
				"PARENT_SECTION_CODE"       => "",
				"INCLUDE_SUBSECTIONS"       => "Y",
				"DISPLAY_DATE"              => "N",
				"DISPLAY_NAME"              => "Y",
				"DISPLAY_PICTURE"           => "Y",
				"DISPLAY_PREVIEW_TEXT"      => "N",

				"CACHE_TYPE"   => "A",
				"CACHE_TIME"   => 360000,
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "Y"
				)
			);
		?>
	</div>
	<div class="active-button-cell">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av",
				array(
				"BUTTON_TYPE" => "link",
				"LINK"        => "/about/blog/",
				"TITLE"       => "Читати більше",
				"ATTR"        => ["rel" => "nofollow"]
				),
			false, array("HIDE_ICONS" => "Y")
			);
		?>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- form ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<div class="av-index-block">
	<div class="container">
		<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2 col-xs-12 col-xs-offset-0">
			<div class="av-page-title">Замовити прайс-лист</div>
			Щоб зробити замовлення, заповніть форму або напишіть на <a href="mailto:office@avmg.com.ua">електронну пошту</a>.
			<div class="av-index-feadback-form">
				<?
				$APPLICATION->IncludeComponent
					(
					"bitrix:form.result.new", "av-index",
						array(
						"AJAX_MODE"           => "Y",
						"AJAX_OPTION_JUMP"    => "N",
						"AJAX_OPTION_STYLE"   => "N",
						"AJAX_OPTION_HISTORY" => "N",

						"SEF_MODE"    => "N",
						"WEB_FORM_ID" => 43,

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
		</div>
	</div>
</div>
<?require $_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"?>