<?
use \Bitrix\Main\Page\Asset;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* ============================================================================================= */
/* ========================================= COUNTINGS ========================================= */
/* ============================================================================================= */
$currentDirectory = $APPLICATION->GetCurDir();
$dirProperty      = $APPLICATION->GetDirPropertyList();
$leftMenu         = "";
$supportLink      = "";
$shopLink         = "";
$hasLeftColumn    = false;

ob_start();
if($dirProperty["NOT_SHOW_LEFT_MENU"] != "Y" && $currentDirectory != SITE_DIR && ERROR_404 != "Y")
	$APPLICATION->IncludeComponent
		(
		"bitrix:menu", "av-vertical",
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
$leftMenu = ob_get_contents();
ob_end_clean();

ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:main.include", "",
	array("AREA_FILE_SHOW" => "file", "PATH" => "/include/support.php")
	);
$supportLink = ob_get_contents();
ob_end_clean();

ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:main.include", "",
	array("AREA_FILE_SHOW" => "file", "PATH" => "/include/shop.php")
	);
$shopLink = ob_get_contents();
ob_end_clean();

$hasLeftColumn = $leftMenu || (file_exists($_SERVER["DOCUMENT_ROOT"].$currentDirectory."sect_inc.php") && $dirProperty["NOT_SHOW_LEFT_MENU"] != "Y") ? true : false;
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
		<?CJSCore::Init(["av"])?>
		<?Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/scripts/main.js")?>
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
		<span itemprop="headline" content="<?$APPLICATION->ShowTitle(false)?>"></span>
		<?
		/* ------------------------------------------- */
		/* ------------------ header ----------------- */
		/* ------------------------------------------- */
		?>
		<header itemscope itemtype="http://schema.org/WPHeader" id="page-header">
			<?
			/* ---------------------------- */
			/* -------- first row --------- */
			/* ---------------------------- */
			?>
			<div class="first-row">
				<?
				$APPLICATION->IncludeComponent
					(
					"bitrix:main.include", "",
					array("AREA_FILE_SHOW" => "file", "PATH" => "/include/hot_line.php")
					);
				$APPLICATION->IncludeComponent
					(
					"bitrix:main.site.selector", "av",
						array(
						"SITE_LIST"  => array("AV", "RU", "EN"),
						"CACHE_TIME" => 3600000,
						"CACHE_TYPE" => "A"
						)
					);
				?>
			</div>
			<?
			/* ---------------------------- */
			/* ---- second row desktop ---- */
			/* ---------------------------- */
			?>
			<div class="second-row-desktop av-responsive-block">
				<a class="logo-cell" href="/" <?if($currentDirectory == SITE_DIR):?>rel="nofollow"<?endif?>>
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:main.include", "",
						array("AREA_FILE_SHOW" => "file", "PATH" => "/include/logo.php")
						);
					?>
				</a>

				<div class="info-cell">
					<div itemscope itemtype="http://schema.org/WPSideBar" id="gadgets-row" class="gadgets-row">
						<div class="lang-twister-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"bitrix:main.site.selector", "av",
									array(
									"SITE_LIST"  => array("AV", "RU", "EN"),
									"CACHE_TIME" => 3600000,
									"CACHE_TYPE" => "A"
									)
								);
							?>
						</div>

						<?if($shopLink):?>
						<div class="shop-cell"><?=$shopLink?></div>
						<?endif?>

						<?if($supportLink):?>
						<div class="support-cell"><?=$supportLink?></div>
						<?endif?>

						<div class="phone-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"bitrix:main.include", "",
								array("AREA_FILE_SHOW" => "file", "PATH" => "/include/hot_line.php")
								);
							?>
						</div>

						<div class="search-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"bitrix:main.include", "",
								array("AREA_FILE_SHOW" => "file", "PATH" => "/include/search.php")
								);
							?>
						</div>

						<div class="user-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"av:visit_site.user.panel", "",
									array(
									"USER_MENU_TYPE" => "user",

									"FORGOT_PASSWORD_URL"              => "/personal/forgot_password/",
									"REGISTRATION_SHOW_FIELDS"         => array("EMAIL", "NAME", "LAST_NAME", "PERSONAL_MOBILE"),
									"REGISTRATION_SHOW_USER_PROPS"     => array(),
									"REGISTRATION_REQUIRED_FIELDS"     => array(),
									"REGISTRATION_REQUIRED_USER_PROPS" => array()
									)
								);
							?>
						</div>
					</div>

					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:menu", "av",
							array(
							"ROOT_MENU_TYPE"     => "top",
							"MAX_LEVEL"          => 2,
							"CHILD_MENU_TYPE"    => "left",
							"USE_EXT"            => "Y",
							"DELAY"              => "N",
							"ALLOW_MULTI_SELECT" => "Y",

							"MENU_CACHE_TYPE"       => "A",
							"MENU_CACHE_TIME"       => 360000,
							"MENU_CACHE_USE_GROUPS" => "Y"
							)
						)
					?>
				</div>
			</div>
			<?
			/* ---------------------------- */
			/* ---- second row mobile ----- */
			/* ---------------------------- */
			?>
			<div class="second-row-mobile av-responsive-block">
				<?
				$APPLICATION->IncludeComponent
					(
					"bitrix:menu", "av_vs_mobile",
						array(
						"ROOT_MENU_TYPE"     => "top",
						"MAX_LEVEL"          => 2,
						"CHILD_MENU_TYPE"    => "left",
						"USE_EXT"            => "Y",
						"DELAY"              => "N",
						"ALLOW_MULTI_SELECT" => "Y",

						"MENU_CACHE_TYPE"       => "A",
						"MENU_CACHE_TIME"       => 360000,
						"MENU_CACHE_USE_GROUPS" => "Y"
						)
					);
				?>

				<a class="logo-cell" href="/" rel="nofollow">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:main.include", "",
						array("AREA_FILE_SHOW" => "file", "PATH" => "/include/logo_mobile.php")
						);
					?>
				</a>

				<div class="search-cell">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:main.include", "",
						array("AREA_FILE_SHOW" => "file", "PATH" => "/include/search_mobile.php")
						);
					?>
				</div>
			</div>
		</header>
		<?
		/* ------------------------------------------- */
		/* ------------------- H1 -------------------- */
		/* ------------------------------------------- */
		?>
		<?if($dirProperty["NOT_SHOW_MAIN_TITLE"] != "Y" && $currentDirectory != SITE_DIR && ERROR_404 != "Y"):?>
		<h1
			id="page-title"
			<?if($dirProperty["TITLE_BACKGROUND"]):?>
			style="background-image: url(<?=$dirProperty["TITLE_BACKGROUND"]?>)"
			<?endif?>
		>
			<?$APPLICATION->ShowTitle(false)?>
		</h1>
		<?endif?>
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
		/* ------------------ body ------------------- */
		/* ------------------------------------------- */
		?>
		<div
			id="page-workarea"
			class="
				<?if($dirProperty["FULL_SCREEN_WORKAREA"] != "Y" && $currentDirectory != SITE_DIR):?>responsive av-responsive-block<?endif?>
				<?if($dirProperty["FULL_SCREEN_WORKAREA"] != "Y" && $hasLeftColumn):?>has-menu<?endif?>
				"
		>
			<?if($hasLeftColumn):?>
			<div class="menu-col">
				<div><?=$leftMenu?></div>
				<div><?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "sect"))?></div>
			</div>

			<div class="content-col">
			<?endif?>