<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$filePathExplode = explode(SITE_TEMPLATE_PATH, __FILE__);
Loc::loadMessages($filePathExplode[0].SITE_TEMPLATE_PATH."/template.php");
/* -------------------------------------------------------------------- */
/* -------------------------- call back form -------------------------- */
/* -------------------------------------------------------------------- */
?>
<div id="page-header-call-back-form">
	<div class="close"></div>
	<div class="title">
		<?=Loc::getMessage("AV_SHOP_CALL_BACK_FORM_TITLE")?>
	</div>
	<div class="separator"></div>
	<div class="body">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:main.include", "",
			["AREA_FILE_SHOW" => "file", "PATH" => "/include/call_back_form.php"],
			false, ["HIDE_ICONS" => true]
			);
		?>
	</div>
</div>
<?
/* -------------------------------------------------------------------- */
/* ----------------------------- sidebar ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<div id="page-header-sidebar">
	<?
	/* ------------------------------------------- */
	/* --------------- user block ---------------- */
	/* ------------------------------------------- */
	?>
	<?if($userIsAuthorized):?>
		<div class="user-block" tabindex="0">
			<div class="icon-block">
				<img
					src="<?=($userPersonalPhoto ? $userPersonalPhoto : SITE_TEMPLATE_PATH."/images/user.svg")?>"
					alt="<?=$userName?>"
					title="<?=$userName?>"
				>
			</div>
			<div class="title-block">
				<div class="title"><?=$userName?></div>
				<div class="arrow"></div>
			</div>
		</div>

		<div class="user-menu">
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:menu", "av-naked",
					[
					"ROOT_MENU_TYPE"     => "user",
					"MAX_LEVEL"          => 1,
					"CHILD_MENU_TYPE"    => "",
					"USE_EXT"            => "Y",
					"DELAY"              => "N",
					"ALLOW_MULTI_SELECT" => "N",

					"MENU_CACHE_TYPE"       => "N",
					"MENU_CACHE_TIME"       => "",
					"MENU_CACHE_USE_GROUPS" => ""
					],
				false, ["HIDE_ICONS" => "Y"]
				);
			?>
			<a href="?logout=yes"><?=Loc::getMessage("AV_SHOP_LOGOUT")?></a>
		</div>
	<?else:?>
		<div class="guest-block">
			<div class="icon-block">
				<img
					src="<?=SITE_TEMPLATE_PATH?>/images/user.svg"
					alt="<?=Loc::getMessage("AV_SHOP_GUEST_TITLE")?>"
					title="<?=Loc::getMessage("AV_SHOP_GUEST_TITLE")?>"
				>
			</div>
			<div class="title-block">
				<div data-header-login-button><?=Loc::getMessage("AV_SHOP_LOGIN")?></div>
				<?if($registrationAvailable):?>
				<div data-header-registration-button><?=Loc::getMessage("AV_SHOP_REGISTRATION")?></div>
				<?endif?>
			</div>
		</div>
	<?endif?>
	<?
	/* ------------------------------------------- */
	/* ------------------ menu ------------------- */
	/* ------------------------------------------- */
	?>
	<div class="menu-block">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:menu", "av-shop-mobile",
				[
				"ROOT_MENU_TYPE"     => "top",
				"MAX_LEVEL"          => 2,
				"CHILD_MENU_TYPE"    => "left",
				"USE_EXT"            => "Y",
				"DELAY"              => "N",
				"ALLOW_MULTI_SELECT" => "Y",

				"MENU_CACHE_TYPE"       => "A",
				"MENU_CACHE_TIME"       => 360000,
				"MENU_CACHE_USE_GROUPS" => "Y"
				],
			false, ["HIDE_ICONS" => "Y"]
			);
		?>
	</div>
	<?
	/* ------------------------------------------- */
	/* ----------- lanfuages selector ------------ */
	/* ------------------------------------------- */
	?>
	<div class="language-selector-block">
		<?
		$APPLICATION->IncludeComponent
			(
			"bitrix:main.site.selector", "av-round",
				[
				"SITE_LIST"  => ["AV", "SH", "EN"],
				"CACHE_TIME" => 3600000,
				"CACHE_TYPE" => "A"
				],
			false, ["HIDE_ICONS" => true]
			);
		?>
	</div>
	<?
	/* ------------------------------------------- */
	/* --------------- links block --------------- */
	/* ------------------------------------------- */
	?>
	<div class="links-block">
		<div><?=$companyLinkHtml?></div>
		<div>
			<?
			$APPLICATION->IncludeComponent
				(
				"bitrix:main.include", "",
				["AREA_FILE_SHOW" => "file", "PATH" => "/include/bases_link_mobile.php"],
				false, ["HIDE_ICONS" => true]
				);
			?>
		</div>
	</div>
</div>