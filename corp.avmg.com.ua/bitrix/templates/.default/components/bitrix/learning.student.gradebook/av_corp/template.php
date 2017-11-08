<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<table class="av-learn-gradebook-table main">
	<tr>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_COURSE")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_TEST")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_LAST_SCORE")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_LAST_RESULT")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_BEST_SCORE")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_RESULT")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_ATTEMPTS")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_ACTION")?></th>
	</tr>

	<?foreach($arResult["RECORDS"] as $infoArray):?>
	<tr>
		<td>
			<a href="<?=$infoArray["COURSE_DETAIL_URL"]?>" title="<?=$infoArray["COURSE_NAME"]?>">
				<?=$infoArray["COURSE_NAME"]?>
			</a>
		</td>
		<td>
			<?=$infoArray["TEST_NAME"]?>
		</td>
		<td
			<?if($infoArray['APPROVED'] == 'N' && $infoArray["COMPLETED"] != 'Y'):?>
			class="checked-manualy"
			title="<?=Loc::getMessage("AV_LEARNING_GRADEBOOK_CHECKED_MANUALLY")?>"
			<?endif?>
		>
			<?=$arResult["LAST_TEST_INFO"][$infoArray["TEST_ID"]]["LAST_SCORE"]?>
		</td>
		<td
			<?if($infoArray['APPROVED'] == 'N' && $infoArray["COMPLETED"] != 'Y'):?>
			class="checked-manualy"
			title="<?=Loc::getMessage("AV_LEARNING_GRADEBOOK_CHECKED_MANUALLY")?>"
			<?endif?>
		>
			<?if($arResult["LAST_TEST_INFO"][$infoArray["TEST_ID"]]["LAST_COMPLETED"] == 'Y'):?><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_YES")?>
			<?else:?><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_NO")?>
			<?endif?>
		</td>
		<td>
			<?=$infoArray["RESULT"]?>
			<?if($infoArray["MAX_RESULT"]):?> / <?=$infoArray["MAX_RESULT"]?><?endif?>
		</td>
		<td
			<?if($infoArray['APPROVED'] == 'N' && $infoArray["COMPLETED"] != 'Y'):?>
			class="checked-manualy"
			title="<?=Loc::getMessage("AV_LEARNING_GRADEBOOK_CHECKED_MANUALLY")?>"
			<?endif?>
		>
			<?if($infoArray["COMPLETED"] == 'Y'):?><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_YES")?>
			<?else:?><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_NO")?>
			<?endif?>
			<?if($infoArray["MARK"]):?>(<?=Loc::getMessage("AV_LEARNING_GRADEBOOK_MARK")?>: <?=$infoArray["MARK"]?>)<?endif?>
		</td>
		<td>
			<a href="<?=$infoArray["ATTEMPT_DETAIL_URL"]?>" title="<?=Loc::getMessage("AV_LEARNING_GRADEBOOK_TEST_DETAIL")?>">
				<?=$infoArray["ATTEMPTS"]?>
			</a>
			<?if($infoArray["ATTEMPT_LIMIT"]>0):?> / <?=$infoArray["ATTEMPT_LIMIT"]?><?endif?>
		</td>
		<td>
			<a href="<?=$infoArray["TEST_DETAIL_URL"]?>" title="<?=Loc::getMessage("AV_LEARNING_GRADEBOOK_TRY_AGAIN")?>">
				<?=Loc::getMessage("AV_LEARNING_GRADEBOOK_TRY_AGAIN")?>
			</a>
		</td>
	</tr>
	<?endforeach?>

	<?if(!$arResult["RECORDS"]):?>
	<tr>
		<td colspan="8"><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_NO_DATA")?></td>
	</tr>
	<?endif?>
</table>

<?if($arResult["ATTEMPTS"]):?>
<h3><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_ATTEMPTS_TITLE")?></h3>

<table class="av-learn-gradebook-table attempts">
	<tr>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_DATE_END")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_TIME_DURATION")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_QUESTIONS")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_SCORE")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_RESULT")?></th>
		<?if($arResult["ATTEMPTS"][0]["MARK"]):?>
		<th><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_MARK")?></th>
		<?endif?>
	</tr>

	<?foreach($arResult["ATTEMPTS"] as $infoArray):?>
	<tr>
		<?if($infoArray["DATE_END"]):?>
			<td><?=$infoArray["DATE_END"]?></td>
			<td><?=CCourse::TimeToStr((MakeTimeStamp($infoArray["DATE_END"]) - MakeTimeStamp($infoArray["DATE_START"])));?></td>
		<?else:?>
			<td><?=$infoArray["DATE_START"]?></td>
			<td><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_ATTEMPT_NOT_FINISHED")?></td>
		<?endif?>
		<td><?=$infoArray["QUESTIONS"]?></td>
		<td>
			<?=$infoArray["SCORE"]?>
			<?if($infoArray["MAX_SCORE"]):?> / <?=$infoArray["MAX_SCORE"]?><?endif?>
		</td>
		<td>
			<?if($infoArray["COMPLETED"] == 'Y'):?><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_YES")?>
			<?else:?><?=Loc::getMessage("AV_LEARNING_GRADEBOOK_NO")?>
			<?endif?>
		</td>
		<?if($infoArray["MARK"]):?>
		<td><?php echo $infoArray["MARK"]?></td>
		<?endif?>
	</tr>
	<?endforeach?>
</table>

<?
$APPLICATION->IncludeComponent
	(
	"av:form.button", "av-corp-alt3",
		[
		"BUTTON_TYPE" => 'link',
		"LINK"        => $arResult["CURRENT_PAGE"],
		"TITLE"       => Loc::getMessage("AV_LEARNING_GRADEBOOK_BACK_LINK"),
		"PLACEHOLDER" => Loc::getMessage("AV_LEARNING_GRADEBOOK_BACK_LINK")
		],
	false, ["HIDE_ICONS" => 'Y']
	);
?>
<?endif?>