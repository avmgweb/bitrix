<?
use
	\Bitrix\Main\Page\Asset,
	\Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

Loc::loadMessages(__FILE__);
/* ============================================================================================= */
/* ========================================= COUNTINGS ========================================= */
/* ============================================================================================= */
$currentDirectory = $APPLICATION->GetCurDir();
$dirProperty      = $APPLICATION->GetDirPropertyList();
/* ============================================================================================= */
/* ==================================== CONTENT BLOCKS HTML ==================================== */
/* ============================================================================================= */
/* -------------------------------------------------------------------- */
/* ------------------------ header company link ----------------------- */
/* -------------------------------------------------------------------- */
$companyLinkHtml = "";
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:main.include", "",
	array("AREA_FILE_SHOW" => "file", "PATH" => "/include/link_company_site.php")
	);
$companyLinkHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* -------------------------- header faq link ------------------------- */
/* -------------------------------------------------------------------- */
$faqLinkHtml = "";
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:main.include", "",
	array("AREA_FILE_SHOW" => "file", "PATH" => "/include/link_faq.php")
	);
$faqLinkHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* ------------------------ header support link ----------------------- */
/* -------------------------------------------------------------------- */
$supportLinkHtml = "";
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:main.include", "",
	array("AREA_FILE_SHOW" => "file", "PATH" => "/include/link_support.php")
	);
$supportLinkHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* -------------------------- header hot line ------------------------- */
/* -------------------------------------------------------------------- */
$hotLineHtml = "";
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:main.include", "",
	array("AREA_FILE_SHOW" => "file", "PATH" => "/include/hot_line.php")
	);
$hotLineHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* ------------------------- header phone list ------------------------ */
/* -------------------------------------------------------------------- */
$phoneListHtml = "";
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:main.include", "",
	array("AREA_FILE_SHOW" => "file", "PATH" => "/include/phone_list.php")
	);
$phoneListHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* ----------------------- header working houres ---------------------- */
/* -------------------------------------------------------------------- */
$workingHouresHtml = "";
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:main.include", "",
	array("AREA_FILE_SHOW" => "file", "PATH" => "/include/working_houres.php")
	);
$workingHouresHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* --------------------------- header basket -------------------------- */
/* -------------------------------------------------------------------- */
$basketLineHtml = "";
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:sale.basket.basket.line", "av",
		array(
		"PATH_TO_BASKET"    => "/personal/cart/",
		"PATH_TO_ORDER"     => "/personal/orders/make/",
		"SHOW_NUM_PRODUCTS" => "Y",
		"SHOW_TOTAL_PRICE"  => "N",
		"SHOW_EMPTY_VALUES" => "N",

		"SHOW_PERSONAL_LINK" => "N",
		"PATH_TO_PERSONAL"   => "/personal/",

		"SHOW_AUTHOR"       => "N",
		"PATH_TO_REGISTER"  => "/personal/register/",
		"PATH_TO_AUTHORIZE" => "/personal/auth/",
		"PATH_TO_PROFILE"   => "/personal/info/",

		"SHOW_PRODUCTS"  => "N",
		"SHOW_DELAY"     => "N",
		"SHOW_NOTAVAIL"  => "N",
		"SHOW_SUBSCRIBE" => "N",
		"SHOW_IMAGE"     => "N",
		"SHOW_PRICE"     => "N",
		"SHOW_SUMMARY"   => "N",

		"POSITION_FIXED"       => "N",
		"POSITION_HORIZONTAL"  => "",
		"POSITION_VERTICAL"    => "",
		"HIDE_ON_BASKET_PAGES" => "N"
		)
	);
$basketLineHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* ------------------------ workarea left menu ------------------------ */
/* -------------------------------------------------------------------- */
$leftMenuHtml = "";
ob_start();
if($dirProperty["NOT_SHOW_LEFT_MENU"] != "Y" && $currentDirectory != SITE_DIR && ERROR_404 != "Y")
	$APPLICATION->IncludeComponent
		(
		"bitrix:menu", "av-shop-vertical",
			array(
			"ROOT_MENU_TYPE"     => "left",
			"MAX_LEVEL"          => 1,
			"CHILD_MENU_TYPE"    => "left",
			"USE_EXT"            => "Y",
			"DELAY"              => "N",
			"ALLOW_MULTI_SELECT" => "N",

			"MENU_CACHE_TYPE"       => "A",
			"MENU_CACHE_TIME"       => 360000,
			"MENU_CACHE_USE_GROUPS" => "Y"
			)
		);
$leftMenuHtml = ob_get_contents();
ob_end_clean();
/* ============================================================================================= */
/* ========================================== DOCUMENT ========================================= */
/* ============================================================================================= */
?>
<!DOCTYPE html>
<html itemscope itemtype="http://schema.org/WebPage" lang="<?=LANGUAGE_ID?>">
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- HEAD ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<head>
		<meta itemprop="inLanguage" content="<?=LANGUAGE_ID?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
		<title><?$APPLICATION->ShowTitle()?></title>
		<link rel="icon" type="image/x-icon" href="/favicon.ico">

		<?$APPLICATION->ShowHead()?>
		<?CJSCore::Init(["av_site"])?>
		<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/scripts/main.js")?>
		<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/scripts/popup.js")?>
		<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/scripts/".LANGUAGE_ID."/google_analytics.js")?>
		<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/scripts/".LANGUAGE_ID."/yandex_metrika.js")?>
	</head>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- BODY ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<body>
		<?$APPLICATION->ShowPanel()?>
		<?
		/* ------------------------------------------- */
		/* ------------------ header ----------------- */
		/* ------------------------------------------- */
		?>
		<header itemscope itemtype="http://schema.org/WPHeader" id="page-header">
			<div class="first-row-wraper">
				<div class="first-row av-responsive-block">
					<div class="left-block"><?include "header/first_row_left_col.php"?></div>
					<div class="right-block"><?include "header/first_row_right_col.php"?></div>
				</div>
			</div>

			<div class="second-row av-responsive-block"><?include "header/second_row.php"?></div>
			<div class="third-row av-responsive-block"><?include "header/third_row.php"?></div>
			<?include "header/tools.php"?>
		</header>
		<?
		/* ------------------------------------------- */
		/* --------------- breadcrumb ---------------- */
		/* ------------------------------------------- */
		?>
		<?if($dirProperty["NOT_SHOW_NAV_CHAIN"] != "Y" && $currentDirectory != SITE_DIR && ERROR_404 != "Y"):?>
		<div id="page-breadcrumbs" class="av-responsive-block">
			<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "av")?>
		</div>
		<?endif?>
		<?
		/* ------------------------------------------- */
		/* ------------------- H1 -------------------- */
		/* ------------------------------------------- */
		?>
		<?if($dirProperty["NOT_SHOW_MAIN_TITLE"] != "Y" && $currentDirectory != SITE_DIR && ERROR_404 != "Y"):?>
		<h1 id="page-title" class="av-responsive-block">
			<?$APPLICATION->ShowTitle(false)?>
		</h1>
		<?endif?>
		<?
		/* ------------------------------------------- */
		/* ------------------ body ------------------- */
		/* ------------------------------------------- */
		?>
		<div
			id="page-workarea"
			<?if($dirProperty["FULL_SCREEN_WORKAREA"] != "Y"):?>
			class="
				<?if($currentDirectory != SITE_DIR):?>responsive av-responsive-block<?endif?>
				<?if($leftMenuHtml):?>has-menu<?endif?>
				"
			<?endif?>
		>
			<?if($leftMenuHtml):?>
			<div class="menu-col">
				<div><?=$leftMenuHtml?></div>
			</div>

			<div class="content-col">
			<?endif?>