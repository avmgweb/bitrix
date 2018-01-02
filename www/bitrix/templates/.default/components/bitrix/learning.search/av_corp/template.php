<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* -------------------------------------------------------------------- */
/* ------------------------------ filter ------------------------------ */
/* -------------------------------------------------------------------- */
?>
<form class="av-learning-search-form" method="get" action="<?=$arParams["SEARCH_PAGE"]?>">
	<?if($arParams["COURSE_ID"] && $arParams["SEF_MODE"] != 'Y'):?>
	<input type="hidden" name="COURSE_ID" value="<?=$arParams["COURSE_ID"]?>">
	<input type="hidden" name="SEARCH"    value="Y">
	<?endif?>
	<?if($arResult["how"] == 'd'):?>
	<input type="hidden" name="how"       value="d">
	<?endif?>

	<h3><?=Loc::getMessage("AV_LEARNING_SEARCH_TITLE")?>: <span><?=$arResult["q"]?></span></h3>

	<div>
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.input", "av-corp-learning-search",
				[
				"NAME"         => 'q',
				"VALUE"        => $arResult["q"],
				"TITLE"        => Loc::getMessage("AV_LEARNING_SEARCH_FORM_TITLE"),
				"PLACEHOLDER"  => Loc::getMessage("AV_LEARNING_SEARCH_FORM_PLACEHOLDER"),
				"SEARCH_TITLE" => Loc::getMessage("AV_LEARNING_SEARCH_FORM_BUTTON_TITLE")
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
</form>
<?
/* -------------------------------------------------------------------- */
/* ------------------------------- list ------------------------------- */
/* -------------------------------------------------------------------- */
?>
<?if(count($arResult["SEARCH_RESULT"])):?>
	<div class="av-learning-search-list">
		<?foreach($arResult["SEARCH_RESULT"] as $itemInfo):?>
		<div class="item">
			<a href="<?=$itemInfo["URL"]?>"><?=$itemInfo["TITLE_FORMATED"]?></a>
			<div><?=$itemInfo["BODY_FORMATED"]?></div>
		</div>
		<?endforeach?>
	</div>

	<?if($arResult["NAV_STRING"]):?>
	<div class="av-learning-search-navigation">
		<?=$arResult["NAV_STRING"]?>
	</div>
	<?endif?>
<?
/* -------------------------------------------------------------------- */
/* --------------------------- empty result --------------------------- */
/* -------------------------------------------------------------------- */
?>
<?else:?>
	<div class="av-learning-search-empty">
		<?=Loc::getMessage("AV_LEARNING_SEARCH_EMPTY_RESULT")?>
	</div>
<?endif?>