<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

include "tools/variables.php";
/* ============================================================================================= */
/* ========================================= COUNTINGS ========================================= */
/* ============================================================================================= */
$currentDirectory      = $APPLICATION->GetCurDir();
$dirProperty           = $APPLICATION->GetDirPropertyList();
$userIsAuthorized      = $USER->IsAuthorized();
$userName              = "";
$userPersonalPhoto     = "";
$registrationAvailable = COption::GetOptionString("main", "new_user_registration") == "Y";
$templateVariables     = $templateVariablesArray[LANGUAGE_ID];

if($userIsAuthorized)
	{
	$userName = htmlspecialcharsEx($USER->GetFormattedName(false, false));
	$queryList = CUser::GetList($by="ID", $order="desc", ["ID" => $USER->GetId()], ["ID", "PERSONAL_PHOTO"]);
	while($queryElement = $queryList->Fetch())
		if($queryElement["PERSONAL_PHOTO"])
			{
			$fileInfo = CFile::GetByID($queryElement["PERSONAL_PHOTO"])->Fetch();
			if(is_array($fileInfo) && $fileInfo["FILE_NAME"]) $userPersonalPhoto = "/upload/".$fileInfo["SUBDIR"]."/".$fileInfo["FILE_NAME"];
			}
	}
/* ============================================================================================= */
/* ==================================== CONTENT BLOCKS HTML ==================================== */
/* ============================================================================================= */
/* -------------------------------------------------------------------- */
/* ------------------------------ basket ------------------------------ */
/* -------------------------------------------------------------------- */
$basketLineHtml = "";
ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:sale.basket.basket.line", "av-shop",
		[
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
		],
	false, ["HIDE_ICONS" => "Y"]
	);
$basketLineHtml = ob_get_contents();
ob_end_clean();
/* -------------------------------------------------------------------- */
/* ---------------------------- left menu ----------------------------- */
/* -------------------------------------------------------------------- */
$leftMenuHtml = "";
ob_start();
if($dirProperty["NOT_SHOW_LEFT_MENU"] != "Y" && $currentDirectory != SITE_DIR && ERROR_404 != "Y")
	$APPLICATION->IncludeComponent
		(
		"bitrix:menu", "av-shop-vertical",
			[
			"ROOT_MENU_TYPE"     => "left",
			"MAX_LEVEL"          => 1,
			"CHILD_MENU_TYPE"    => "left",
			"USE_EXT"            => "Y",
			"DELAY"              => "N",
			"ALLOW_MULTI_SELECT" => "N",

			"MENU_CACHE_TYPE"       => "A",
			"MENU_CACHE_TIME"       => 360000,
			"MENU_CACHE_USE_GROUPS" => "Y"
			],
		false, ["HIDE_ICONS" => "Y"]
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
		<?CJSCore::Init(["av", "font_awesome"])?>
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
		/* ---------- organization microdata --------- */
		/* ------------------------------------------- */
		?>
		<div itemscope itemtype="http://schema.org/Organization">
			<span itemprop="name"        content="<?=$templateVariables["COMPANY_INFO"]["NAME"]?>"></span>
			<span itemprop="description" content="<?=$templateVariables["COMPANY_INFO"]["DESCRIPTION"]?>"></span>
			<span itemprop="url"         content="<?=$templateVariables["COMPANY_INFO"]["SITE"]?>"></span>
			<span itemprop="email"       content="<?=$templateVariables["COMPANY_INFO"]["EMAIL"]?>"></span>
			<?foreach($templateVariables["COMPANY_INFO"]["PHONES"] as $phone):?>
			<span itemprop="telephone"   content="<?=$phone?>"></span>
			<?endforeach?>

			<div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
				<span itemprop="addressCountry"  content="<?=$templateVariables["COMPANY_INFO"]["COUNTRY"]?>"></span>
				<span itemprop="addressLocality" content="<?=$templateVariables["COMPANY_INFO"]["CITY"]?>"></span>
				<span itemprop="streetAddress"   content="<?=$templateVariables["COMPANY_INFO"]["STREET"]?>"></span>
			</div>

			<div itemprop="logo" itemscope itemtype="http://schema.org/ImageObject">
				<span itemprop="caption" content="<?=$templateVariables["COMPANY_INFO"]["NAME"]?>"></span>
				<span itemprop="url"     content="<?=CURRENT_PROTOCOL?>://<?=$_SERVER["SERVER_NAME"].$templateVariables["COMPANY_INFO"]["LOGO"]?>"></span>
				<span itemprop="width"   content="300"></span>
				<span itemprop="height"  content="50"></span>
			</div>
		</div>
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
		</header>
		<?
		/* ------------------------------------------- */
		/* ------------------ tools ------------------ */
		/* ------------------------------------------- */
		?>
		<?include "tools/components.php"?>
		<?
		/* ------------------------------------------- */
		/* --------------- breadcrumb ---------------- */
		/* ------------------------------------------- */
		?>
		<?if($dirProperty["NOT_SHOW_NAV_CHAIN"] != "Y" && $currentDirectory != SITE_DIR && ERROR_404 != "Y"):?>
		<div id="page-breadcrumbs" class="av-responsive-block">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:breadcrumb", "av",
				[],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
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
			<?if($currentDirectory != SITE_DIR):?>
			class="
				responsive av-responsive-block
				<?if($leftMenuHtml):?>has-menu<?endif?>
				"
			<?endif?>
		>
			<?if($leftMenuHtml):?>
			<div class="menu-col">
				<div><?=$leftMenuHtml?></div>
				<div><?$APPLICATION->IncludeFile($APPLICATION->GetCurDir()."sect_inc.php", [], ["MODE" => "php"])?></div>
			</div>

			<div class="content-col">
			<?endif?>