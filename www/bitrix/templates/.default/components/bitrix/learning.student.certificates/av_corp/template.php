<?
use \Bitrix\Main\Localization\Loc;

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<table class="av-learn-certificates-table">
	<tr>
		<th><?=Loc::getMessage("AV_LEARNING_CERTIFICATES_COURSE")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_CERTIFICATES_NAME")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_CERTIFICATES_RESULT")?></th>
		<th><?=Loc::getMessage("AV_LEARNING_CERTIFICATES_SCORE")?></th>
	</tr>

	<?foreach($arResult["COURSES"] as $courseInfo):?>
	<tr>
		<td>
			<?=$courseInfo["CODE"]?>
		</td>
		<td>
			<a href="<?=$courseInfo["COURSE_DETAIL_URL"]?>"><?=$courseInfo["NAME"]?></a>
		</td>
		<td>
			<?if($courseInfo["COMPLETED"]):?>
				<?=Loc::getMessage("AV_LEARNING_CERTIFICATES_YES")?>
			<?else:?>
				<?if($courseInfo["NO_TESTS"]):?><?=Loc::getMessage("AV_LEARNING_CERTIFICATES_NO_TESTS")?>
				<?else:?><a href="<?=$courseInfo["TESTS_LIST_URL"]?>"><?=Loc::getMessage("AV_LEARNING_CERTIFICATES_NO")?></a>
				<?endif?>
			<?endif?>
		</td>
		<td>
			<?if($courseInfo["COMPLETED"]):?><?=$arResult["CERTIFICATES"][$courseInfo["ID"]]["SUMMARY"]?> / <?=$arResult["CERTIFICATES"][$courseInfo["ID"]]["MAX_SUMMARY"]?>
			<?else:?>0
			<?endif?>
		</td>
	</tr>
	<?endforeach?>

	<?if(!$arResult["COURSES"]):?>
	<tr>
		<td colspan="4"><?=Loc::getMessage("AV_LEARNING_CERTIFICATES_NO_DATA")?></td>
	</tr>
	<?endif?>
</table>