<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* ============================================================================================= */
/* ========================================= COUNTINGS ========================================= */
/* ============================================================================================= */
$currentPage         = $APPLICATION->GetCurPage(false);
$dirProperty         = $APPLICATION->GetDirPropertyList();
$workAreaType        = '';
$leftMenuSeted       = false;
$useBreadcrumbs      = $dirProperty["NOT_SHOW_NAV_CHAIN"] == 'Y' ? false : true;
$availableMarkupType = ["container_page", "left_menu_page", "full_screen_page"];

foreach(["top", "left"] as $menuType)
	{
	$menuObj = new CMenu($menuType);
	$menuObj->Init($APPLICATION->GetCurPage());
	if($menuType == 'left' && count($menuObj->arMenu)) $leftMenuSeted = true;

	foreach($menuObj->arMenu as $menuInfo)
		{
		$menuLink            = explode('?', $menuInfo[1])[0];
		$menuSubstring       = substr_count($currentPage, $menuLink)        ? true : false;
		$inheritWorkareaType = $menuInfo[3]["inherit_workarea_type"] == 'Y' ? true : false;

		if
			(
			in_array($menuInfo[3]["workarea_type"], $availableMarkupType)
			&&
				(
				$currentPage == $menuLink
				||
				($menuSubstring && $inheritWorkareaType)
				)
			)
			$workAreaType = $menuInfo[3]["workarea_type"];
		elseif
			(
			in_array($menuInfo[3]["children_workarea_type"], $availableMarkupType)
			&&
			$currentPage != $menuLink
			&&
			$menuSubstring
			)
			$workAreaType = $menuInfo[3]["children_workarea_type"];
		}
	}

if(!$workAreaType && $leftMenuSeted)             $workAreaType   = 'left_menu_page';
if(!$workAreaType)                               $workAreaType   = 'container_page';
if($currentPage == SITE_DIR || ERROR_404 == 'Y') $workAreaType   = 'full_screen_page';
if($workAreaType == 'full_screen_page')          $useBreadcrumbs = false;
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
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/scripts/'.LANGUAGE_ID.'/yandex_metrika.js')?>
	</head>
	<?
	/* -------------------------------------------------------------------- */
	/* ------------------------------- BODY ------------------------------- */
	/* -------------------------------------------------------------------- */
	?>
	<body id="av-vst">
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
				<div>
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:main.site.selector", "av",
							array(
							"SITE_LIST"  => array("RU","AV"),
							"CACHE_TIME" => 3600000,
							"CACHE_TYPE" => 'A'
							)
						);
					?>
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
						<div class="desktop-lang-twister-cell">
							<?
							$APPLICATION->IncludeComponent
								(
								"bitrix:main.site.selector", "av",
									array(
									"SITE_LIST"  => array("RU","AV"),
									"CACHE_TIME" => 3600000,
									"CACHE_TYPE" => 'A'
									)
								);
							?>
						</div>

						<div class="desktop-phone-cell">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/hot_line.php'))?>
						</div>

						<div class="desktop-search-cell">
							<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'file', "PATH" => '/include/search.php'))?>
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

		<div class="page-workarea <?=$workAreaType?><?if($workAreaType != 'full_screen_page'):?> container<?endif?>">
			<?if($workAreaType != 'full_screen_page'):?>
			<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-12 col-xs-offset-0">
			<?endif?>
				<?if($useBreadcrumbs):?>
				<div class="page-breadcrumbs">
					<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "av")?>
				</div>
				<?endif?>

				<?if($workAreaType == 'left_menu_page'):?>
				<div class="col-lg-4 col-md-4 hidden-sm hidden-xs left-column">
					<?
					$APPLICATION->IncludeComponent
						(
						"bitrix:menu", "av_vs_vertical",
							array(
							"ROOT_MENU_TYPE"     => 'left',
							"MAX_LEVEL"          => 1,
							"CHILD_MENU_TYPE"    => 'left',
							"USE_EXT"            => 'Y',
							"DELAY"              => 'N',
							"ALLOW_MULTI_SELECT" => 'N',

							"MENU_CACHE_TYPE"       => 'A',
							"MENU_CACHE_TIME"       => 360000,
							"MENU_CACHE_USE_GROUPS" => 'Y'
							)
						)
					?>
					<div class="bottom">
						<?$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => 'sect'))?>
					</div>
				</div>

				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 right-column">
				<?endif?>