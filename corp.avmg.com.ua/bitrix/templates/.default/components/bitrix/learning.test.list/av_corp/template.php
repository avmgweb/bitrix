<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<?foreach($arResult["TESTS"] as $testInfo):?>
<div class="av-learning-tests-list-item">
	<h3><?=$testInfo["NAME"]?></h3>

	<?if($testInfo["ATTEMPT_LIMIT"]):?>
	<div>
		<?=Loc::getMessage("AV_LEARNING_TESTS_LIST_ATTEMPT_LIMIT")?>: <b><?=$testInfo["ATTEMPT_LIMIT"]?></b>
	</div>
	<?endif?>

	<?if($testInfo["TIME_LIMIT"]):?>
	<div>
		<?=Loc::getMessage("AV_LEARNING_TESTS_LIST_TIME_LIMIT")?>: <b><?=$testInfo["TIME_LIMIT"]?></b> <?=Loc::getMessage("AV_LEARNING_TESTS_LIST_TIME_LIMIT_MIN")?>
	</div>
	<?endif?>

	<div>
		<?=Loc::getMessage("AV_LEARNING_TESTS_LIST_PASSAGE_TYPE")?>:
			<?if($testInfo["PASSAGE_TYPE"] == 2):?>    <?=Loc::getMessage("AV_LEARNING_TESTS_LIST_PASSAGE_FOLLOW_EDIT")?>
			<?elseif($testInfo["PASSAGE_TYPE"] == 1):?><?=Loc::getMessage("AV_LEARNING_TESTS_LIST_PASSAGE_FOLLOW_NO_EDIT")?>
			<?else:?>                                  <?=Loc::getMessage("AV_LEARNING_TESTS_LIST_PASSAGE_NO_FOLLOW_NO_EDIT")?>
			<?endif?>
	</div>

	<?if($testInfo["PREVIOUS_TEST_ID"] && $testInfo["PREVIOUS_TEST_SCORE"] && $testInfo["PREVIOUS_TEST_LINK"]):?>
	<div class="important">
		<?=str_replace
			(
			["#TEST_LINK#", "#TEST_SCORE#"],
			[$testInfo["PREVIOUS_TEST_LINK"], $testInfo["PREVIOUS_TEST_SCORE"]],
			Loc::getMessage("AV_LEARNING_TESTS_LIST_PREV_TEST_REQUIRED")
			)
		?>
	</div>
	<?endif?>

	<form action="<?=$testInfo["TEST_DETAIL_URL"]?>" method="post">
		<input type="hidden" name="COURSE_ID" value="<?=$testInfo["COURSE_ID"]?>">
		<input type="hidden" name="ID"        value="<?=$testInfo["ID"]?>">
		<?
		$APPLICATION->IncludeComponent
			(
			"av:form.button", "av-corp-alt3",
				[
				"BUTTON_TYPE" => 'submit',
				"NAME"        => 'next',
				"TITLE"       => !$testInfo["ATTEMPT"] ? Loc::getMessage("AV_LEARNING_TESTS_LIST_START") : Loc::getMessage("AV_LEARNING_TESTS_LIST_CONTINUE"),
				"DISABLED"    => isset($testInfo["PREVIOUS_NOT_COMPLETE"]) ? 'Y' : 'N'
				],
			false, ["HIDE_ICONS" => 'Y']
			);
		?>
	</form>
</div>
<?endforeach?>

<?if($arResult["NAV_STRING"]):?>
<div class="av-learning-tests-list-pagination">
	<?=$arResult["NAV_STRING"]?>
</div>
<?endif?>