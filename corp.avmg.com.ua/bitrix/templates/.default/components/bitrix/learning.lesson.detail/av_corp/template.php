<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<div class="av-learning-course-lesson">
	<h3 class="title"><?=$arResult["LESSON"]["NAME"]?></h3>
	<?=$arResult["LESSON"]["DETAIL_TEXT"]?>
	<?if($arResult["LESSON"]["SELF_TEST_EXISTS"]):?>
	<div class="test-link">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-corp-alt3",
				[
				"BUTTON_TYPE" => 'link',
				"LINK"        => $arResult["LESSON"]["SELF_TEST_URL"],
				"TITLE"       => Loc::getMessage("AV_LEARNING_COURSE_LESSON_PAST_TEST"),
				"PLACEHOLDER" => Loc::getMessage("AV_LEARNING_COURSE_LESSON_PAST_TEST")
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</div>
	<?endif?>
</div>