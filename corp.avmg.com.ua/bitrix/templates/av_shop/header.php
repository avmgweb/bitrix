<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* ============================================================================================= */
/* ========================================= COUNTINGS ========================================= */
/* ============================================================================================= */
$currentPage = $APPLICATION->GetCurPage(false);
$dirProperty = $APPLICATION->GetDirPropertyList();
$leftMenu    = '';

ob_start();
$APPLICATION->IncludeComponent
	(
	"bitrix:menu", "av_shop_vertical",
		array(
		"ROOT_MENU_TYPE"     => 'left',
		"MAX_LEVEL"          => 2,
		"CHILD_MENU_TYPE"    => 'left',
		"USE_EXT"            => 'Y',
		"DELAY"              => 'N',
		"ALLOW_MULTI_SELECT" => 'N',

		"MENU_CACHE_TYPE"       => 'A',
		"MENU_CACHE_TIME"       => 360000,
		"MENU_CACHE_USE_GROUPS" => 'Y'
		)
	);
$leftMenu = ob_get_contents();
ob_end_clean();
/* ============================================================================================= */
/* ========================================== DOCUMENT ========================================= */
/* ============================================================================================= */
?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- HEAD ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
		<title><?$APPLICATION->ShowTitle()?></title>
		<link rel="icon" type="image/x-icon" href="/favicon.ico">

		<?$APPLICATION->ShowHead()?>
		<?CJSCore::Init(["bootstrap", "av_site"])?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/scripts/main.js')?>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/scripts/'.LANGUAGE_ID.'/google_analytics.js')?>
		<?//$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/scripts/'.LANGUAGE_ID.'/yandex_metrika.js')?>
	</head>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- BODY ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<body id="av-shop">
		<?$APPLICATION->ShowPanel()?>
		<?
		/* ------------------------------------------- */
		/* ------------------ header ----------------- */
		/* ------------------------------------------- */
		?>
		<header>
			<div class="hidden-lg hidden-md mobile-first-row">
				<div>
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/hot_line.php'))?>
				</div>
			</div>

			<div class="container">
				<?
				/* ---------------------------- */
				/* --------- desktop ---------- */
				/* ---------------------------- */
				?>
				<div class="col-lg-2 col-md-2 hidden-sm hidden-xs desktop-left-col">
					<?if($currentPage != SITE_DIR):?><a href="/"><?endif?>
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/logo.php'))?>
					<?if($currentPage != SITE_DIR):?></a><?endif?>
				</div>

				<div class="col-lg-10 col-md-10 hidden-sm hidden-xs desktop-right-col">
					<div class="desktop-gadgets-row">
						<div class="desktop-phone-cell">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/hot_line.php'))?>
						</div>

						<div class="desktop-search-cell">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/search.php'))?>
						</div>

						<div class="desktop-basket-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"bitrix:sale.basket.basket.line", "av",
									array(
									"PATH_TO_BASKET"    => '/user/cart/',
									"PATH_TO_ORDER"     => '/user/order/make/',
									"SHOW_NUM_PRODUCTS" => 'Y',
									"SHOW_TOTAL_PRICE"  => 'N',
									"SHOW_EMPTY_VALUES" => 'N',

									"SHOW_PERSONAL_LINK" => 'N',
									"PATH_TO_PERSONAL"   => '/user/',

									"SHOW_AUTHOR"       => 'N',
									"PATH_TO_REGISTER"  => '/user/register/',
									"PATH_TO_AUTHORIZE" => '/user/auth/',
									"PATH_TO_PROFILE"   => '/user/info/',

									"SHOW_PRODUCTS"  => 'N',
									"SHOW_DELAY"     => 'N',
									"SHOW_NOTAVAIL"  => 'N',
									"SHOW_SUBSCRIBE" => 'N',
									"SHOW_IMAGE"     => 'N',
									"SHOW_PRICE"     => 'N',
									"SHOW_SUMMARY"   => 'N',

									"POSITION_FIXED"       => 'N',
									"POSITION_HORIZONTAL"  => '',
									"POSITION_VERTICAL"    => '',
									"HIDE_ON_BASKET_PAGES" => 'N'
									)
								)
							?>
						</div>

						<div>
							<?
							$APPLICATION->IncludeComponent
								(
								"av:visit_site.user.panel", "",
									array(
									"PROFILE_URL"         => '/user/info/index.php',
									"FORGOT_PASSWORD_URL" => '/user/forgot_password/',
									"BASKET_URL"          => '',

									"REGISTRATION_SHOW_FIELDS"         => array("EMAIL", "NAME", "LAST_NAME", "PERSONAL_MOBILE"),
									"REGISTRATION_SHOW_USER_PROPS"     => array(),
									"REGISTRATION_REQUIRED_FIELDS"     => array(),
									"REGISTRATION_REQUIRED_USER_PROPS" => array()
									)
								)
							?>
						</div>
					</div>

					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:menu", "av_vs",
							array(
							"ROOT_MENU_TYPE"     => 'top',
							"MAX_LEVEL"          => 2,
							"CHILD_MENU_TYPE"    => 'left',
							"USE_EXT"            => 'Y',
							"DELAY"              => 'N',
							"ALLOW_MULTI_SELECT" => 'Y',

							"MENU_CACHE_TYPE"       => 'A',
							"MENU_CACHE_TIME"       => 360000,
							"MENU_CACHE_USE_GROUPS" => 'Y'
							)
						)
					?>
				</div>
				<?
				/* ---------------------------- */
				/* ---------- mobile ---------- */
				/* ---------------------------- */
				?>
				<div class="hidden-lg hidden-md mobile-second-row">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:menu", "av_vs_mobile",
							array(
							"ROOT_MENU_TYPE"     => 'top',
							"MAX_LEVEL"          => 2,
							"CHILD_MENU_TYPE"    => 'left',
							"USE_EXT"            => 'Y',
							"DELAY"              => 'N',
							"ALLOW_MULTI_SELECT" => 'Y',

							"MENU_CACHE_TYPE"       => 'A',
							"MENU_CACHE_TIME"       => 360000,
							"MENU_CACHE_USE_GROUPS" => 'Y'
							)
						);
					?>

					<?if($currentPage != SITE_DIR):?><a href="/"><?endif?>
					<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/logo_mobile.php'))?>
					<?if($currentPage != SITE_DIR):?></a><?endif?>

					<div class="mobile-search-cell">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/search_mobile.php'))?>
					</div>
				</div>
			</div>
		</header>
		<?
		/* ------------------------------------------- */
		/* ------------------ body ------------------- */
		/* ------------------------------------------- */
		?>
		<?if($currentPage != SITE_DIR && ERROR_404 != 'Y'):?>
		<h1 class="page-main-title" <?if($dirProperty["TITLE_BACKGROUND"]):?>style="background-image: url(<?=$dirProperty["TITLE_BACKGROUND"]?>)"<?endif?>>
			<?$APPLICATION->ShowTitle(false)?>
		</h1>
		<?endif?>

		<div class="page-workarea container">
			<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">
				<?if($dirProperty["NOT_SHOW_NAV_CHAIN"] == 'Y'):?>
				<div class="page-breadcrumbs">
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "av")?>
				</div>
				<?endif?>

				<?if($leftMenu):?>
				<div class="col-lg-4 col-md-4 hidden-sm hidden-xs page-left-column">
					<?=$leftMenu?>
				</div>

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 page-right-column">
				<?endif?>